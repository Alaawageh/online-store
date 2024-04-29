<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Specification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\storeRequest;
use App\Http\Requests\Product\updateRequest;
use App\Http\Requests\RatingRequest;
use App\Models\Category;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::withoutGlobalScope('status')->paginate(10);
        return view('backend.product.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = Category::withoutGlobalScope('status')->get();
        return view('backend.product.create',[
            'categories' => $categories
        ]);
    }

    public function store(storeRequest $request)
    {
        DB::beginTransaction();
        try{
            $product = Product::create($request->safe()->all());
            if(isset($request->key)){
                foreach ($request->key as $key => $one){
                    Specification::create([
                        'product_id' => $product->id,
                        'key' => $one,
                        'value' => $request->value[$key],
                    ]);
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }
        return redirect(route('product.index',$product))->with(['success'=>'Created Successfully']);

    }

    public function show(Product $product)
    {
        $product = Product::find($product->id);
        return view('backend.product.show', [
            'product' => $product,
        ]);
    }

    public function edit(Product $product)
    {
        $categories = Category::withoutGlobalScope('status')->get();
        return view('backend.product.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(updateRequest $request, Product $product)
    {
        $product->update($request->safe()->all());
        if(isset($request->key)) {

            $old_specs_ids = $product->Specifications->pluck('id')->toArray();
            $to_be_stored = [];

            foreach ($request->id as $key => $oneId){
                if(in_array($oneId, $old_specs_ids)){
                    $to_be_stored[] = $oneId;
                }
                Specification::updateOrCreate(
                    ['id' => $oneId],
                    [
                        'product_id' => $product->id,
                        'key' => $request->key[$key],
                        'value' => $request->value[$key],
                    ]
                );
            }
            foreach ($old_specs_ids as $one) {
                if(!in_array($one, $to_be_stored)){
                    $specs = Specification::find($one);
                    if($specs){
                        $specs->delete();
                    }
                }
            }

        }
        return redirect(route('product.index', $product))->with(['update'=>'Updated Successfully']);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with(['delete'=>'Deleted Successfully']);
    }


    public function add_specs()
    {
        return view('backend.product._add_specs', [
            'id' => $_GET['id'],
        ]);
    }

    public function submitRating(RatingRequest $request){
        Rating::create($request->safe()->all());
        return back()->with('success','Your review has been submitted Successfully,');
    }
    public function changeStatus(Product $product)
    {
        $product->update(['status' => !$product->status]);
        return redirect(route('product.index'))->with(['update'=>'Updated Successfully']);

    }
}
