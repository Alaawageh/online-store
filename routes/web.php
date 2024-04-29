<?php

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SpecificationController;
use App\Http\Controllers\backend\RolesController;
use App\Http\Controllers\backend\PermissionsController;
use App\Http\Controllers\backend\UsersController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\GmailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/admin')->middleware('auth')->group(function(){
    Route::resource('dashboard',DashboardController::class);
    Route::resource('category',CategoryController::class);
    Route::put('category/changeStatus/{category}',[CategoryController::class,'changeStatus'])->name('category.changeStatus');
    Route::resource('product',ProductController::class);
    Route::put('product/changeStatus/{product}',[ProductController::class,'changeStatus'])->name('product.changeStatus');
    Route::resource('specification',SpecificationController::class);
    Route::get('/add_specs', [ProductController::class, 'add_specs']);
    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);
    Route::resource('users', UsersController::class);
    Route::resource('order',OrderController::class);
    Route::get('/change_status/{order}', [OrderController::class, 'change_status'])->name('order.change_status');
    Route::put('/save_status', [OrderController::class, 'save_status'])->name('order.save_status');
    Route::get('emails',[GmailController::class,'index'])->name('email');
    Route::get('/email/mark-as-read/{id}', [GmailController::class,'markAsRead'])->name('email.markAsRead');
    Route::get('/email/{id}', [GmailController::class,'show'])->name('email.show');

});

Auth::routes();
Route::get('categories',[HomeController::class,'getCategories'])->name('categories');
Route::get('products',[HomeController::class,'getProducts'])->name('products');
Route::get('show/category/{category}',[HomeController::class,'showCategory'])->name('show.item');
Route::get('product/details/{product}',[HomeController::class,'showProduct'])->name('product.details');
Route::get('/products/category/{category}', [HomeController::class, 'filterByCategory'])->name('products.category');

Route::middleware('auth')->group(function(){
    Route::post('/submit-rating', [ProductController::class,'submitRating'])->name('submit-rating');
    Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/descrease_cart_item/{id}', [CartController::class, 'descrease_cart_item'])->name('cart.decrease');
    Route::get('/cart/increase_cart_item/{id}', [CartController::class, 'increase_cart_item'])->name('cart.increase');
    Route::get('/cart/remove_cart_item/{id}', [CartController::class, 'remove_cart_item']);
    Route::get('/cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/create_order', [CartController::class, 'create_order'])->name('cart.create_order');
    Route::get('/cart/payment', [CartController::class, 'payment'])->name('cart.payment');
    Route::get('/cart/order_process', [CartController::class, 'order_process'])->name('cart.order_process');
    Route::get('/cart',[HomeController::class,'showCart'])->name('cart');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('login',function(){
    return view('auth.login');
})->name('login');



