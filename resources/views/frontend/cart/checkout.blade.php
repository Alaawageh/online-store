@extends('layouts.frontend')
@section('content')
<div class=" cart">
    <form class="form" method="post" action="{{route('cart.create_order')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <h3 style="text-align: center">Personal Information</h3>
                <div class="row">
                    <div class="col-md-6"> 
                        <label>First Name</label>
                        <input class="form-control" name="first_name" value="{{Auth::user()->name}}">
                    </div>
                    <div class="col-md-6"> 
                        <label>Last Name</label>
                        <input class="form-control" name="last_name" >
                    </div>
                   
                    <div class="col-md-6"> 
                        <label>Email</label>
                        <input class="form-control" name="email" value="{{Auth::user()->email}}">
                    </div>
                    <div class="col-md-6"> 
                        <label>phone</label>
                        <input class="form-control" name="phone" >
                    </div>
                    <div class="col-md-12">
                        <label>Address</label>
                        <textarea class="form-control" name="address"></textarea> 
                    </div>
                </div> 
                <input id="lat" type="hidden" name="lat">
                <input id="lng" type="hidden" name="lng">
                  <div id="map" style="height: 300px"></div>
            </div>
            <div class="col-md-6">
                <h3 style="text-align: center">Cart Content</h3>
        
        <?php foreach ($products as $key => $one){ ?>
        <input style="display: none;" type="text" name="products[<?= $key ?>][id]" value="<?= $one['product']->id ?>">
        <input style="display: none;" type="text" name="products[<?= $key ?>][qty]" value="<?= $one['qty'] ?>">
        <div class="row border-top border-bottom">
            <div class="row main align-items-center">
                <div class="col"><img class="img-fluid" width="200px" src="{{asset($one['product']->image)}}"></div>
                <div class="col">
                    <div class="row text-muted"><?= $one['product']->en_name ?></div>
                    <div class="row"><?= $one['product']->ar_name ?></div>
                </div>
                <div class="col">
                    
                    <div class="item_qty"><?= $one['qty'] ?></div>
                    
                </div>
                <div class="col">
                    &euro; <?= $one['product']->price ?>
                    {{-- <span class="close cart_product_remove" data-cart_id="<?= $one->id ?>" data-id="cart_item_<?= $one->id ?>">&#10005;</span> --}}
                </div>
                <div class="col">
                    &euro; <?= $one['product']->price * $one['qty'] ?>
                    {{-- <span class="close cart_product_remove" data-cart_id="<?= $one->id ?>" data-id="cart_item_<?= $one->id ?>">&#10005;</span> --}}
                </div>
            </div>
        </div>
        <?php } ?>
   
        <button type="submit" class="btn btn-primary pull-right" style="float: right;">Pay</button>
    </div>
        </div>
    </form>



</div>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCy_WwZRPLvcel7UsxRkSR7lAZKQDDUYck&callback=initMap">
</script>
<script src="{{asset('custom/frontend_map.js')}}"></script>
@endsection