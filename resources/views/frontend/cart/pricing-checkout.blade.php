<?php
use App\Enums\OrderEnum;
?>
<div class="site-content">
    <div class="checkout-area checkout-thanks-area">
        <div class="container">
            <h2>Thank you for your order!</h2>
            <h3>Order Detail</h3>
            <div class="order-detail">
                <p>
                    <span>Order Status</span>
                    <span class="pakage-name"><?= OrderEnum::Labels()[$order->status] ?></span>
                </p>
                <p>
                    <span>Number of products</span>
                    <span>{{$order->products->count()}}</span>
                </p>
                <p class="total">
                    <span>Total</span>
                    <span>$5.99</span>
                </p>
            </div>
            <div class="align-center">
                {{-- <a href="#" class="btn btn-print"><i class="las la-print"></i>Print invoice</a> --}}
            </div>
        </div>
    </div><!-- .checkout-area -->
</div> 