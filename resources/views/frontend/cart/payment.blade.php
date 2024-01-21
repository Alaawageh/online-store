<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <!-- Other Tags -->

    <!-- Moyasar Styles -->
    <link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.5.4/moyasar.css">

    <!-- Moyasar Scripts -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=fetch"></script>
    <script src="https://cdn.moyasar.com/mpf/1.5.4/moyasar.js"></script>

    <!-- Download CSS and JS files in case you want to test it locally, but use CDN in production -->
</head>

<div class="mysr-form"></div>
<script>
    Moyasar.init({
        // Required
        // Specify where to render the form
        // Can be a valid CSS selector and a reference to a DOM element
        element: '.mysr-form',

        // Required
        // Amount in the smallest currency unit
        // For example:
        // 10 SAR = 10 * 100 Halalas
        // 10 KWD = 10 * 1000 Fils
        // 10 JPY = 10 JPY (Japanese Yen does not have fractions)
        amount: <?= $order->TotalPrice()*100 ?>,

        // Required
        // Currency of the payment transation
        currency: 'USD',

        // Required
        // A small description of the current payment process
        description: 'Order #' + '<?= $order->id ?>',

        // Required
        publishable_api_key: 'pk_test_BH175eNDzxuiwKkdbC3umZjmxLWxLT4XxcFVLiRJ',

        // Required
        // This URL is used to redirect the user when payment process has completed
        // Payment can be either a success or a failure, which you need to verify on you system (We will show this in a couple of lines)
        callback_url: '<?= route('cart.order_process', ['order_id' => $order->id]) ?>',

        // Optional
        // Required payments methods
        // Default: ['creditcard', 'applepay', 'stcpay']
        methods: [
            'creditcard',
        ],
    });
</script>

</html>
