<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   

    public function index()
    {
        $categories = Category::with('products')->withCount('products')->get();
        $products = Product::with('category')->latest()->get();
        
        return view('frontend.home.index', [
                'products' => $products,
                'categories' => $categories
        ]);
    }

    public function showCategory(Category $category, Request $request)
    {
        $sortBy = $request->get('sort_by', 'name');
        $order = $request->get('order', 'asc');

        $items = $category->products()->orderBy($sortBy, $order)->paginate(2);
        return view('frontend.pages.category', [
            'items' => $items,
            'category' => $category,
            'sortBy' => $sortBy,
            'order' => $order,
        ]);
    }

    public function showProduct(Product $product)
    {
        $specifications = $product->Specifications()->get();
        $ratings = $product->ratings()->where('user_id',Auth::user()?->id)->first();
        $avgRate = $product->ratings()->avg('rate');
        $comments = $product->ratings()->with('user')->where('user_id','!=',Auth::user()?->id)->latest('comment')->limit(3)->get();
        $products = Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->latest()->take('5')->get(); 
        return view('frontend.pages.product',[
            'product' => $product,
            'specifications' => $specifications,
            'products' => $products,
            'ratings' => $ratings,
            'avgRate' => $avgRate,
            'comments' => $comments
        ]);
    }
    public function  getCategories()
    {
        $categories = Category::all();
        
        return view('frontend.home.categories',[
            'categories' => $categories
        ]);

    }   
    public function getProducts(Request $request)
    {
        $sortBy = $request->input('sort_by', 'created_at');
        $order = $request->get('order', 'desc');
        $products = Product::with(['category','ratings'])
                            ->where('name','like','%' .$request->search. '%')
                            ->orWhere('price','like','%' .$request->search. '%')
                            ->orderBy($sortBy, $order)
                            ->get();
        $categories = Category::all();
        return view('frontend.home.products', [
            'products' => $products,
            'sortBy' => $sortBy,
            'order' => $order,
            'categories' => $categories,
        ]);
    }
    public function filterByCategory(Category $category,Request $request)
    {
        $sortBy = $request->input('sort_by', 'created_at');
        $order = $request->get('order', 'desc');
        $products = $category->products;
        $categories = Category::orderBy('id','desc')->get();
        return view('frontend.home.products',  compact('products', 'categories', 'sortBy', 'order'));
    }

    public function showCart()
    {
        
        $cartItems = Cart::where('user_id',Auth::user()->id)->get();
        return view('frontend.cart.content', [
            'items' => $cartItems,
        ]);
    }
     

   
    

}
