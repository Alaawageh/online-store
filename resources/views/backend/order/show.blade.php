
<div class="modal-content">
    <div class="modal-header">
        Order Detials <span class="close pull-right" data-dismiss="modal">&times;</span>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                @foreach ($details as $key => $one)
                <div class="row cart_item_<?= $one->id ?>">
                    <div class="col-1">
                        <img class="img-fluid" src="{{asset($one->image)}}">
                    </div>
                    <div class="col-2">
                        <p><strong>Product: </strong><br> {{$one->name}} </p>
                    </div>
                    <div class="col-1">
                        <p><strong>Qty: </strong><br> {{$one->pivot->qty}} </p>
                    </div>
                    <div class="col-2">
                        <p><strong>Total Price: </strong><br>{{ $one->pivot->price }}</p>                               
                    </div>
                    <div class="col-2">
                        <p><strong>Address: </strong><br> {{$order->address}} </p>
                    </div>
                </div>
                @endforeach
                </div>
                <div class="col-md-3">
                    <div id="map" style="height: 300px;"> </div>
                </div>
            </div>
        </div>
    </div>
        
</div>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCy_WwZRPLvcel7UsxRkSR7lAZKQDDUYck&callback=initMap">
</script>
<script>
    var cityLocation = { lat: {{ $order->lat }}, lng: {{ $order->lng }} };

    function initMap(){
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5,
            center: cityLocation
        });
        var marker = new google.maps.Marker({
            position: cityLocation,
            map: map,
        });
    }

    window.initMap = initMap;
</script> 

