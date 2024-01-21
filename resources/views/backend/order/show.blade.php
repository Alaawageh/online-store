
<div class="modal-content">
    <div class="modal-header">
        Order Detials <span class="close pull-right" data-dismiss="modal">&times;</span>
    </div>

    <div class="">
        <div class="">
            <div class=" cart">
                    <?php foreach ($details as $key => $one){ ?>
                    <div class="row border-top border-bottom cart_item_<?= $one->id ?>">
                        <div class="row main align-items-center">
                            <div class="col-2">
                                <img class="img-fluid" width="250px" src="{{asset($one->image)}}">
                            </div>
                            <div class="col">
                                <div class="row text-muted"><?= $one->en_name ?></div>
                                <div class="row"><?= $one->ar_name ?></div>
                            </div>
                            <div class="col">
                                <div class="item_qty"><?= $one->pivot->qty ?></div>
                            </div>
                            <div class="col">
                                &euro; <?= $one->pivot->price ?>
                            </div>
                            
                        </div>
                    </div>
                    <?php } ?>
                        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->generate($one->pivot->order_id) !!}


            </div>

        </div>
    </div>
</div>
