<!DOCTYPE html>
<html>
<head>
    <title>Order Notification</title>
</head>
<body>
    <h2>Order Details:</h2>
    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Customer Name:</strong> {{ $order->first_name }} {{$order->last_name}}</p>
    <p><strong>Email:</strong> {{ $order->email }}</p>
    @foreach ($order->products as $item)
    <p><strong>Product Name:</strong> {{$item->name}} </p>
    <p><strong>Product Price:</strong> {{$item->price}} </p>
    <p><strong>Product qty:</strong> {{$item->pivot->qty}} </p>
    <p><strong>Total Price:</strong> {{$item->pivot->price * $item->pivot->qty}} </p>
    
    @endforeach
    <hr>

    <p>This is a notification email for a new order. Please review the order details and take necessary actions.
        {{-- <a href="{{route('order')}}">Click Here</a> --}}
    </p>

</body>
</html>
