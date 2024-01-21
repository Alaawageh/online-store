<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $orders = Order::count();
        $sales = DB::table('orders_products')->sum('price');
        return view('backend.dashboard',[
            'users' => $users,
            'orders' => $orders,
            'sales' => $sales
        ]);
    }


}
