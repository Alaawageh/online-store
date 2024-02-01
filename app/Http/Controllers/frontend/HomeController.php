<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Specification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   

    public function index()
    {
        $categories =  Category::where('status',true)->with('products')->withCount('products')->get();

        $products = Product::with('category')->latest()->get();
        return view('frontend.home.index', [
                'products' => $products,
                'categories' => $categories
        ]);
    }

    public function showCategory(Category $category)
    {
        $items = $category->products()->paginate('6');
        return view('frontend.pages.category',[
            'items' => $items
        ]);
    }
    public function showProduct(Product $product)
    {
        $specifications = $product->Specifications()->get(); 
        return view('frontend.pages.product',[
            'product' => $product,
            'specifications' => $specifications
        ]);
    }

}
