@extends('layouts.frontend')

@section('content')
    <div class=" cart">
        <?php if($order->payment_status == \App\Enums\PaymentEnum::paid){ ?>
            <div class="alert-info">
                Payment done successfully
            </div>
        <?php } else { ?>
            <div class="alert-info">
                Error in payment
            </div>
        <?php } ?>

    </div>
@endsection







