<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Specification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories =  Category::withCount('products')->get();
        $products = Product::paginate('4');
        return view('frontend.home.index', [
                'products' => $products,
                'categories' => $categories
        ]);
    }

}
