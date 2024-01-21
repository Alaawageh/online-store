<?php

namespace App\Http\Controllers\frontend;

// use App\Enums\OrderEnum;

use App\Enums\OrderEnum;
use App\Enums\PaymentEnum;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        $cart_item = Cart::where(['product_id' => $id], ['user_id' => Auth::user()->id])->first();
       
        if($cart_item){
            $cart_item->qty = $cart_item->qty+1;
            $cart_item->save();
        } else {
            $cart_item = Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $id,
                'qty' => 1,
            ]);
        }
        
        $all_cart_item = Cart::where(['user_id' => Auth::user()->id])->get();
        
         return view('frontend.cart.content', [
            'items' => $all_cart_item,
        ]);
    }

    public function descrease_cart_item($id){
        $cart_item = Cart::where(['id' => $id])->first();
        if($cart_item){
            $cart_item->qty = $cart_item->qty-1;
            $cart_item->save();
        }

        // return response()->json(['status' => 'success']);
    }

    public function increase_cart_item($id){
        $cart_item = Cart::where(['id' => $id])->first();
        if($cart_item){
            $cart_item->qty = $cart_item->qty+1;
            $cart_item->save();
        }

        // return response()->json(['status' => 'success']);
    }

    public function remove_cart_item($id){
        $cart_item = Cart::where(['id' => $id])->first();
        if($cart_item){
            $cart_item->delete();
           
        }

        // return response()->json(['status' => 'success']);
    }

    public function store(Request $request){
     
    //   $products = [];
    //   foreach($request['products'] as $key => $one){
    //     $product = Product::where('id',$one['id'])->get();
    //     foreach($product as $x){
    //         $products[$key]['product'] = $x;
    //         $products[$key]['qty'] = $one['qty'];
    //     }
       
    //   }
        $products = Cart::where('user_id',Auth::user()->id)->with('product')->get();
        return view('frontend.cart.checkout',[
            'products' => $products,
        ]);
    }


    public function create_order(Request $request)
    {
        // dd($request);
        $model = Order::create([
            'user_id' => Auth::user()->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'status' => OrderEnum::new_order,
            // 'payment_status' => PaymentEnum::not_paid,
        ]);
        if (isset($request->products)) {
            $productIds = array_column($request->products, 'id');
            $products = Product::findMany($productIds);
     
            foreach ($request->products as $key => $one) {
                $product = $products->firstWhere('id', $one['id']);
                if ($product) {
                    $specs = OrderProduct::create([
                       'order_id' => $model->id,
                       'product_id' => $one['id'],
                       'qty' => $one['qty'],
                       'price' => $product->price,
                    ]);
                }
            }
        }
        $details = [
            'title' => 'New Order in Qasioun Mall',
            'body' => 'xxx'
        ];
        Mail::to('alaawajeh29@gmail.com')->send(new \App\Mail\NewOrder($details));
            
        $cart = Cart::where(['user_id' => Auth::user()->id])->get();
        foreach ($cart as $item) {
            $item->delete();
        }
    
        return redirect(route('cart.payment', ['id' => $model->id]));
    }

public function payment(){
    $id = $_GET['id'];
    $order = Order::where(['id' => $id])->first();
    return view('frontend.cart.payment', [
        'order' => $order,
    ]);
}

public function order_process(){
    $id = $_GET['order_id'];
    $order = Order::where(['id' => $id])->first();
    if($_GET['status'] == 'paid'){
        $order->payment_status = PaymentEnum::paid;
        $order->save();

    }
    $order->payment_response = json_encode($_GET);
    $order->save();


    return view('frontend.cart.payment_success', [
        'order' => $order,
    ]);
}

}



