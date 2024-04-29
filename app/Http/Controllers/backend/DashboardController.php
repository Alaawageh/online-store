<?php

namespace App\Http\Controllers\backend;

use App\Enums\OrderEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [];
        $data['users'] = User::count();
        $data['orders'] = Order::withTrashed()->count();
        $data['sales'] = DB::table('orders_products')->sum('price');
        $data['finished'] = Order::where('status',OrderEnum::delivered)->count();
        $data['pending'] = Order::where('status',OrderEnum::new_order)->count();
        $data['topRating'] = Rating::with('product')
                            ->selectRaw('AVG(rate) as average_rating ,product_id')
                            ->groupBy('ratings.product_id')
                            ->orderBy('average_rating', 'desc')->limit(5)
                            ->get();
        $data['topSalles'] = OrderProduct::with('product')
                            ->selectRaw('SUM(qty) as QTY , product_id')
                            ->groupBy('orders_products.product_id')
                            ->orderBY('QTY','desc')
                            ->limit(5)
                            ->get();
        $data['Rejected'] = Order::onlyTrashed()->count();
        return view('backend.dashboard',[
            'data' => $data
        ]);
    }



}
