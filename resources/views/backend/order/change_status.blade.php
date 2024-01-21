
<div class="modal-content">
    <div class="modal-header">
        Order Detials <span class="close pull-right" data-dismiss="modal">&times;</span>
    </div>

    <div class="">
        <div class="">
            <div class=" cart">
                <form class="form" method="post" action="{{route('order.save_status')}}" enctype="multipart/form-data">
                    @csrf
                    <input style="display: none;" name="id" value="<?= $order->id ?>">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <select name="status" class="form-control">
                                <?php foreach (\App\Enums\OrderEnum::Labels() as $key => $value){ ?>
                                    <option value="<?= $key ?>"><?= $value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-2 col-12">
                            <button type="submit" class="btn btn-primary mr-1 mb-1">
                                Save
                            </button>
                        </div>
                    </div>
                  
                </form>

            </div>

        </div>
    </div>
