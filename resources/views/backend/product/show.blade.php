@extends('layouts.app')
<!-- END: Head-->
@section('title', 'Product Details')

@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Profile</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Pages</a>
                        </li>
                        <li class="breadcrumb-item active">Profile
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
                                <img src="{{asset($model->image)}}" class="rounded-circle img-sm img-border box-shadow-1" alt="Card image">
                                <div class="float-right">
                                    <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1">
                                        <i class="feather icon-edit-2"></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary">
                                        <i class="feather icon-settings"></i>
                                    </button>
                                </div>
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
                                    <h6 class="mb-0">Arabic Name</h6>
                                    <p><?= $model->ar_name ?></p>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">English Name</h6>
                                    <p>{{$model->en_name}}</p>
                                </div>
                                {{-- <div class="mt-1">
                                    <h6 class="mb-0">Email:</h6>
                                    <p>bucketful@fiendhead.org</p>
                                </div>
                                <div class="mt-1">
                                    <h6 class="mb-0">Website:</h6>
                                    <p>www.pixinvent.com</p>
                                </div> --}}
                                <div class="mt-1">
                                    <button type="button" class="btn btn-sm btn-icon btn-primary mr-25 p-25"><i class="feather icon-facebook"></i></button>
                                    <button type="button" class="btn btn-sm btn-icon btn-primary mr-25 p-25"><i class="feather icon-twitter"></i></button>
                                    <button type="button" class="btn btn-sm btn-icon btn-primary p-25"><i class="feather icon-instagram"></i></button>
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
                                    <?php foreach ($model->Specifications as $one){ ?>
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
