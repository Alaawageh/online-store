@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Edit Product ({{$product->id}})</h2>
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
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route('product.update', $product)}}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label>Name</label>
                                            <div class="form-label-group">
                                                <input type="text" id="name-column" class="form-control" placeholder="Name" name="name" value="{{$product->name}}">
                                                <div class="danger">@error('name'){{$message}}@enderror</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Description</label>
                                            <div class="form-label-group">
                                                <input type="text" id="description-column" class="form-control" placeholder="Description" name="description" value="{{$product->description}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Price</label>
                                            <div class="form-label-group">
                                                <input type="number" id="price-column" class="form-control" placeholder="Price" name="price" value="{{$product->price}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Quantity</label>
                                            <div class="form-label-group">
                                                <input type="number" id="qty-column" class="form-control" placeholder="Quantity" name="qty" value="{{$product->qty}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Category</label>
                                            <div class="form-label-group">
                                                <select class="form-control" name="category_id">
                                                    <option value="{{ $product->category_id }}"> {{$product->category->name}} </option>
                                                    <?php foreach ($categories as $one){ ?>
                                                        <option value="<?= $one->id ?>"><?= $one->name ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="first-name-column">Category</label>
                                                <div class="danger">@error('category_id'){{$message}}@enderror</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Image</label>
                                            <div class="form-label-group">
                                                <input type="file" id="image-column" class="form-control" placeholder="Image" name="image">
                                                <div class="danger">@error('image'){{$message}}@enderror</div>
                                                <?php
                                                if($product->image){
                                                    echo '<img class="img-lg" src="'.asset($product->image).'">';
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    More Details
                                                    <div class="product_specs">
                                                        <?php foreach ($product->Specifications as $key => $specification) { ?>
                                                            @include('backend.product._add_specs', [
                                                                'id' => $key+1,
                                                                'product' => $specification,
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
</div>
<script src="{{asset('custom/product_form.js')}}"></script>
@endsection
