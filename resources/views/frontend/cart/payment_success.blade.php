@extends('layouts.frontend')
@section('title','payment success')
@section('content')
    <div class="cart">
        <?php if($order->payment_status == \App\Enums\PaymentEnum::paid){ ?>
            <script>
                toastr.success('Payment done successfully');
            </script>
        <?php } else { ?>
            <script>
                toastr.warning('Error in payment');
            </script>
        <?php } ?>
        @include('frontend.cart.pricing-checkout')
       
    </div>
@endsection







