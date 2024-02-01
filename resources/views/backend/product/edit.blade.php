@extends('layouts.app')
<!-- END: Head-->
@section('title', 'Edit Product')

@section('content')


    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Edit Product ({{$model->id}})</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('product.index')}}">Products</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">Edit Product</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">

        <!-- // Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" method="post" action="{{route('product.update', $model)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <label>Arabic Name</label>
                                                <div class="form-label-group">
                                                    <input type="text" id="ar_name-column" class="form-control" placeholder="Arabic Name" name="ar_name" value="{{$model->ar_name}}">
                                                    <label for="first-name-column">Arabic Name</label>
                                                    <div class="danger">@error('ar_name'){{$message}}@enderror</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label>English Name</label>
                                                <div class="form-label-group">
                                                    <input type="text" id="en_name-column" class="form-control" placeholder="Engilsh Name" name="en_name" value="{{$model->en_name}}">
                                                    <label for="last-name-column">English Name</label>
                                                    <div class="danger">@error('en_name'){{$message}}@enderror</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label>Arabic Description</label>
                                                <div class="form-label-group">
                                                    <input type="text" id="ar_description-column" class="form-control" placeholder="Arabic description" name="ar_description" value="{{$model->ar_description}}">
                                                    <label for="last-name-column">Arabic Description</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label>English Description</label>
                                                <div class="form-label-group">
                                                    <input type="text" id="en_description-column" class="form-control" placeholder="Engilsh Description" name="en_description" value="{{$model->en_description}}">
                                                    <label for="last-name-column">English Description</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label>Price</label>
                                                <div class="form-label-group">
                                                    <input type="number" id="price-column" class="form-control" placeholder="Price" name="price" value="{{$model->price}}">
                                                    <label for="last-name-column">Price</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label>Quantity</label>
                                                <div class="form-label-group">
                                                    <input type="number" id="qty-column" class="form-control" placeholder="Quantity" name="qty" value="{{$model->qty}}">
                                                    <label for="last-name-column">Quantity</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label>Category</label>
                                                <div class="form-label-group">
                                                    <select class="form-control" name="category_id">
                                                        <option value="{{$model->category_id}}">{{$model->category->name}}</option>
                                                        <?php foreach ($categories as $one){ ?>
                                                            <option value="<?= $one->id ?>"><?= $one->name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="first-name-column">Category</label>
                                                    <div class="danger">@error('category_id'){{$message}}@enderror</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label>status</label>
                                                <div class="form-label-group">
                                                    <div class="custom-control custom-switch custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="status" name="status" value="1" {{ $model->status ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="status"></label>                                   
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <label>Image</label>
                                                <div class="form-label-group">
                                                    <input type="file" id="image-column" class="form-control" placeholder="Image" name="image">
                                                    <label for="last-name-column">Image</label>
                                                    <div class="danger">@error('image'){{$message}}@enderror</div>
                                                    <?php
                                                    if($model->image){
                                                        echo '<img class="img-lg" src="'.asset($model->image).'">';
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-12">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        More Details
                                                        <div class="product_specs">
                                                            <?php foreach ($model->Specifications as $key => $specification) { ?>
                                                                @include('backend.product._add_specs', [
                                                                    'id' => $key+1,
                                                                    'model' => $specification,
                                                                ])
                                                           <?php } ?>
                                                        </div>
                                                        <div>
                                                            <button type="button" class="btn btn-sm btn-primary" id="add_product_details">
                                                                <i class="fa fa-plus-circle"></i>
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                                <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic Floating Label Form section end -->

    </div>
    <script src="{{asset('custom/product_form.js')}}"></script>
@endsection
