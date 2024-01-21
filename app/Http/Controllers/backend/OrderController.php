<?php

namespace App\Http\Controllers\backend;

use App\Enums\OrderEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $models = Order::paginate(10);
        return view('backend.order.index', [
            'models' => $models
        ]);
    }
    public function show(Order $order)
    {
        $details = $order->products()->get();
        return view('backend.order.show', [
            'details' => $details
        ]);
    }
    public function change_status(Order $order){
        $id = '';
        foreach ($_GET as $key => $value){
            $id = $key;
            break;
        }
        $orders = Order::where(['id' => $id])->get();
        $order = '';
        foreach ($orders as $one){
            $order = $one;
            break;
        }
        return view('backend.order.change_status', [
            'order' => $order,
        ]);
    }

    public function save_status(Request $request){
        $orders = Order::where(['id' => $request->id])->get();
        $order = '';
        foreach ($orders as $one){
            $order = $one;
            break;
        }
        $order->status = $request->status;
        $order->save();

        //change product qty
        // if($order->status != OrderEnum::new_order){
        //     foreach ($order->orderProducts as $one){
        //         $one->product->qty = $one->product->qty - $one->qty;
        //         $one->product->save();
        //     }
        // }
        //

        return redirect(route('order.index'));
    }


}
