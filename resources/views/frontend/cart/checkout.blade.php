@extends('layouts.frontend')
@section('title','Checkout')
@section('content')
<div class=" cart">
    <form class="form" method="post" action="{{route('cart.create_order')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <h3 style="text-align: center">Personal Information</h3>
                <div class="row">
                    <div class="col-md-6"> 
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_name" value="{{Auth::user()->name}}" required>
                        <div class="danger">@error('first_name'){{$message}}@enderror</div>
                    </div>
                    <div class="col-md-6"> 
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" required>
                        <div class="danger">@error('last_name'){{$message}}@enderror</div>
                    </div>
                   
                    <div class="col-md-6"> 
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" readonly>
                        <div class="danger">@error('email'){{$message}}@enderror</div>
                    </div>
                    <div class="col-md-6"> 
                        <label>phone</label>
                        <input type="number" class="form-control" name="phone" required>
                        <div class="danger">@error('phone'){{$message}}@enderror</div>
                    </div>
                    <div class="col-md-12">
                        <label>Address</label>
                        <textarea class="form-control" name="address" required></textarea> 
                        <div class="danger">@error('address'){{$message}}@enderror</div>
                    </div>
                </div> 
                <input id="lat" type="hidden" name="lat" required>
                <input id="lng" type="hidden" name="lng" required>
                
                <div id="map" style="height: 300px"></div>

            </div>
            <div class="col-lg-4">
               
                <div class="package-review">
                    <h2 style="text-align: center">Cart Content</h2>
                    <label></label>
                    <div class="pricing-item">
                        <?php $total = 0; ?>
                        @foreach ($products as $key => $one)
                        <input style="display: none;" type="text" name="products[<?= $key ?>][id]" value="<?= $one['product']->id ?>">
                        <input style="display: none;" type="text" name="products[<?= $key ?>][qty]" value="<?= $one['qty'] ?>">
                        <div class="row main align-items-center">
                            <div class="col">
                                <?= $one['product']->name ?>
                            </div>
                            <div class="col">
                                <?= $one['qty'] ?>
                            </div>
                            <div class="col">
                                &euro; <?= $one['product']->price ?>
                            </div>
                            <div class="col">
                                &euro; <?= $one['product']->price * $one['qty'] ?>
                            </div>
                        </div>
                        <?php $total += $one['product']->price * $one['qty']; ?>
                        @endforeach
                        <div class="total">
                            <h4>Total</h4>
                            <span>&euro; <?= $total ?></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Pay</button>
                    </div>
                </div>
              
            </div>
        </div>
    </form>
</div>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCy_WwZRPLvcel7UsxRkSR7lAZKQDDUYck&callback=initMap">
</script>
<script src="{{asset('custom/frontend_map.js')}}"></script>
@endsection