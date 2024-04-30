<?php

namespace App\Http\Controllers\frontend;

use App\Enums\OrderEnum;
use App\Enums\PaymentEnum;
use App\Events\Create_Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Email;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

class CartController extends Controller
{
    
    public function add($id)
    {
        $cart_item = auth()->user()->carts()->where('product_id',$id)->first();
        if($cart_item){
            $this->increaseQuantity($cart_item);
        } else {
            $this->createCartItem($id);
        }
        $all_cart_item = $this->getAllCartItems();
        return view('frontend.cart.content', [
            'items' => $all_cart_item,
        ]);
    }
    private function getAllCartItems()
    {
        return auth()->user()->carts()->get();
    }
    private function increaseQuantity($cartItem)
    {
        $cartItem->increment('qty');
    }
    private function createCartItem($productId)
    {
        auth()->user()->carts()->create([
            'product_id' => $productId,
            'qty' => 1,
        ]);
    }
    public function descrease_cart_item($id){
        $cart_item = auth()->user()->carts()->where('id',$id)->first();
        if($cart_item) {
            $cart_item->decrement('qty');
        }
    }

    public function increase_cart_item($id){
        $cart_item = auth()->user()->carts()->where('id',$id)->first();
        if($cart_item){
            $this->increaseQuantity($cart_item);
        }
    }

    public function remove_cart_item($id){
        $cart_item = auth()->user()->carts()->where('id',$id)->first();
        if($cart_item){
            $cart_item->delete();
        }
    }

    public function store(Request $request){
     
        $products = auth()->user()->carts()->with('product')->get();
        return view('frontend.cart.checkout',[
            'products' => $products,
        ]);
    }


    public function create_order(StoreOrderRequest $request)
    {
        $order = auth()->user()->orders()->create($request->safe()->all());
        // $order = Order::create([
        //     'user_id' => Auth::user()->id,
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'lat' => $request->lat,
        //     'lng' => $request->lng,
        //     'status' => OrderEnum::new_order,
        // ]);
        if (isset($request->products)) {
            $productIds = array_column($request->products, 'id');
            $products = Product::findMany($productIds);
     
            foreach ($request->products as $key => $one) {
                $product = $products->firstWhere('id', $one['id']);
                if ($product) {
                    $specs = OrderProduct::create([
                       'order_id' => $order->id,
                       'product_id' => $one['id'],
                       'qty' => $one['qty'],
                       'price' => $product->price * $one['qty'],
                    ]);
                }
            }
        }
        Email::create([
            'order_id'=>$order->id,
            'user_id' => Auth::user()->id,
        ]);

        event(new Create_Order($order));
        
            
        $cart = Cart::where(['user_id' => Auth::user()->id])->get();
        foreach ($cart as $item) {
            $item->delete();
        }
    
        return redirect(route('cart.payment', ['id' => $order->id]));
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
    // $details = [
    //     'title' => 'New Order in Ashion ',
    //     'body' => 'xxx'
    // ];
    // $user = $order->email;
    // Mail::to($user)->send(new \App\Mail\PaymentOrder($details));

    return view('frontend.cart.payment_success', [
        'order' => $order,
    ]);
}

}



