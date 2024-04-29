<?php

namespace App\Http\Controllers\backend;

use App\Enums\OrderEnum;
use App\Http\Controllers\Controller;
use App\Jobs\UpdateDetailsProduct;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);
        return view('backend.order.index', [
            'orders' => $orders
        ]);
    }
    public function show(Order $order)
    {
        $details = $order->products()->get();
        return view('backend.order.show', [
            'details' => $details,
            'order' => $order
        ]);
    }
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect(route('order.index'))->with(['delete'=>'Deleted Successfully']);
    }
    public function change_status(Order $order)
    {
        return view('backend.order.change_status', [
            'order' => $order,
        ]);
    }

    public function save_status(Request $request)
    {
        $order = Order::where('id',$request->id)->first();
        $order->update(['status' => $request->status]);
        //change product qty
        UpdateDetailsProduct::dispatch($request->id);

        return redirect(route('order.index'))->with(['success'=>'Deleted Successfully']);
    }


}
