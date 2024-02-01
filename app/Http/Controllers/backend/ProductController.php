<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Specification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Product::paginate(3);
        return view('backend.product.index', [
            'models' => $models
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.product.create',[
            'categories' => $categories
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
           'ar_name' => 'required|string|max:255',
           'en_name' => 'required|string|max:255',
           'image' => 'required|image|mimes:png,jpg,jpeg',
           'ar_description' => 'nullable|string',
           'en_description' => 'nullable|string',
           'price' => 'required|numeric|min:0',
           'qty' => 'numeric',
           'status' => 'boolean|nullable',
           'category_id' => 'exists:categories,id'
        ]);
        $validateData['status'] = $request->status ?? false;
        $model = Product::create($validateData);

        if(isset($request->key)){
            foreach ($request->key as $key => $one){
                $specs = Specification::create([
                    'product_id' => $model->id,
                    'key' => $one,
                    'value' => $request->value[$key],
                ]);
            }
        }

        return redirect(route('product.show', $model));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        $model = Product::find($product->id);
        return view('backend.product.show', [
            'model' => $model,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('backend.product.edit', [
            'model' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'ar_name' => 'string|max:255',
            'en_name' => 'string|max:255',
            'image' => 'image|mimes:png,jpg,jpeg',
            'ar_description' => 'nullable|string',
            'en_description' => 'nullable|string',
            'price' => 'numeric|min:0',
            'qty' => 'numeric',
            'status' => 'boolean|nullable',
            'category_id' => 'exists:categories,id'
         ]);
         $validateData['status'] = $request->status ?? false;
        $product->update($validateData);
        if(isset($request->key)){
            $old_specs_ids = []; //القيم القديمة يلي كاتت قبل التعديل 
            foreach ($product->Specifications as $one){
                $old_specs_ids[] = $one->id;
            }
            $to_be_stored = [];// القيم يلي بدي ياها تضل معي 

            foreach ($request->id as $key => $oneId){
                if(in_array($oneId, $old_specs_ids)){
                    $to_be_stored[] = $oneId;
                }
                $specs = Specification::find($oneId);
                if(!$specs){
                    $specs = Specification::create([
                        'product_id' => $product->id,
                        'key' => $request->key[$key],
                        'value' => $request->value[$key],
                    ]);
                }
                else{
                    Specification::find($oneId)->update([ 'key' => $request->key[$key],'value' =>$request->value[$key] ]);  
                }
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


        return redirect(route('product.index', $product));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'));
    }


    public function add_specs()
    {
        return view('backend.product._add_specs', [
            'id' => $_GET['id'],
        ]);
        // return 'aaa';
    }
}
