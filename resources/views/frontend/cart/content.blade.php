
<div class="modal-content">
    <div class="modal-header">
        Shopping Cart <span class="close pull-right" data-dismiss="modal">&times;</span>
    </div>

    <div class="">
        <div class="">
            <div class=" cart">
                <form class="form" method="post" action="{{route('cart.store')}}" enctype="multipart/form-data">
                    @csrf
                    <?php foreach ($items as $key => $one){ ?>
                    <input style="display: none;" type="text" name="products[<?= $key ?>][id]" value="<?= $one->product->id ?>">
                    <input style="display: none;" type="text" name="products[<?= $key ?>][qty]" value="<?= $one->qty ?>">
                    <div class="row border-top border-bottom cart_item_<?= $one->id ?>">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" width="250px" src="{{asset($one->product->image)}}"></div>
                            <div class="col">
                                <div class="row text-muted"><?= $one->product->en_name ?></div>
                                <div class="row"><?= $one->product->ar_name ?></div>
                            </div>
                            <div class="col">
                                <a class="cart_product_minus" data-cart_id="<?= $one->id ?>" data-id="cart_item_<?= $one->id ?>" href="#">-</a>
                                <div class="item_qty"><?= $one->qty ?></div>
                                <a class="cart_product_plus" data-cart_id="<?= $one->id ?>" data-id="cart_item_<?= $one->id ?>" href="#">+</a>
                            </div>
                            <div class="col">
                                &euro; <?= $one->product->price ?>
                                <span class="close cart_product_remove" data-cart_id="<?= $one->id ?>" data-id="cart_item_<?= $one->id ?>">&#10005;</span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <button type="submit" class="btn btn-primary pull-right" style="float: right;">Checkout</button>

                </form>



            </div>

        </div>
    </div>
