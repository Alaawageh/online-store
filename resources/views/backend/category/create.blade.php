@extends('layouts.app')
<!-- END: Head-->
@section('title', 'Create Category')

@section('content')



    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Create Category</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('category.index')}}">Categories</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">Form</a>
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
                                <form class="form" method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <label>Name</label>
                                                <div class="form-label-group">
                                                    <input type="text" id="name-column" class="form-control" placeholder="Name" name="name" required>
                                                    <div class="danger">@error('name'){{$message}}@enderror</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label>status</label>
                                                <div class="form-label-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" value="{{'on' ? 1 : 0}}">
                                                        <label class="custom-control-label" for="customSwitch1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <label>Image</label>
                                                <div class="form-label-group">
                                                    <input type="file" id="image-column" class="form-control" placeholder="Image" name="image" required>
                                                    <label for="last-name-column">Image</label>
                                                    <div class="danger">@error('image'){{$message}}@enderror</div>
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
        <!-- // Basic Floating Label Form section end -->

    </div>

    @endsection
