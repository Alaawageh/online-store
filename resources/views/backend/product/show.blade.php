@extends('layouts.app')
<!-- END: Head-->
@section('title', 'Product Details')

@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Products</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Products</a>
                        </li>
                        <li class="breadcrumb-item active">Product Details
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrum-right">
            <div class="dropdown">
                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
            </div>
        </div>
    </div>
</div>
    <div class="content-body">
        <div id="user-profile">
            <div class="row">
                <div class="col-12">
                    <div class="profile-header mb-2">
                        <div class="relative">
                            <div class="cover-container">
                            </div>
                            <div class="profile-img-container d-flex align-items-center justify-content-between">
                                <img src="{{asset($product->image)}}" class="rounded-circle img-sm img-border box-shadow-1" alt="Card image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section id="profile-info">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>About</h4>
                                <i class="feather icon-more-horizontal cursor-pointer"></i>
                            </div>
                            <div class="card-body">
                                <div class="mt-1">
                                    <h6 class="mb-0">Name</h6>
                                    <p>{{$product->name}}</p>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">Price</h6>
                                    <p>{{$product->price}}</p>
                                </div>
                                <div>
                                    <h6>Description</h6>
                                    <p>{{$product->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Details</h4>
                                <i class="feather icon-more-horizontal cursor-pointer"></i>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <?php foreach ($product->Specifications as $one){ ?>
                                        <tr>
                                            <th><?= $one->key ?></th>
                                            <td><?= $one->value ?></td>
                                        </tr>
                                    <?php } ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                </div>
            </section>
        </div>

    </div>
@endsection
