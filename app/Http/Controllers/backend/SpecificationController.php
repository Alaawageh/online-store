<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Specification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Specification\storeRequest;

class SpecificationController extends Controller
{
    public function index()
    {
        $products = Product::withoutGlobalScope('status')->with('Specifications')->get();
        return view('backend.specification.index',compact('products'));
    }

    public function create()
    {
        $products = Product::withoutGlobalScope('status')->get();
        return view('backend.specification.create',compact('products'));
    }

    public function store(storeRequest $request)
    {
        foreach ($request->key as $key => $one){
            $specification = Specification::create([
                'product_id' => $request->product_id,
                'key' => $one,
                'value' => $request->value[$key],
            ]);
        }
        
        return redirect(route('specification.index',$specification))->with(['success'=>'Created Successfully']);
        ;
    }
    public function show(Specification $specification)
    {
        //
    }
    public function edit(Specification $specification)
    {
        $products = $specification->Product()->get();
        return view('backend.specification.edit',[
            'specification' => $specification,
            'products' => $products
        ]);
    }

    public function update(Request $request, Specification $specification)
    {
      
    }
    public function destroy(Specification $specification)
    {
        $specification->delete();
        return redirect(route('specification.index'))->with(['delete'=>'Deleted Successfully']);
    }
}
