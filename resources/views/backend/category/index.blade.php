@extends('layouts.app')
@section('title', 'Categories')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Categories</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Categories
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@include('backend.script')
<div class="content-body">
    <section id="data-thumb-view" class="data-thumb-view-header">
        <div class="action-btns d-none">
            <div class="btn-dropdown mr-1 mb-1">

            </div>
        </div>
        <!-- dataTable starts -->
        <div class="table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="top">
                    <div class="actions action-btns">
                        <div class="btn-group dropdown actions-dropodown">

                        </div>
                        <div class="dt-buttons btn-group">
                            <a class="btn btn-outline-primary" href="{{route('category.create')}}">
                                <span><i class="feather icon-plus"></i> Add New</span></a>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="card">
                        <table class="table data-thumb-view dataTable no-footer dt-checkboxes-select" id="DataTables_Table_0" role="grid">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th scope="col" width="1%" colspan="3"></th>    
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $i = 1;
                                    foreach ($categories as $category){ ?>
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            <img class="img-lg" src="{{ asset($category->image) }}">
                                        </td>
                                        <td>{{$category->name}}</td>
                                        <td>
                                            <form action="{{ route('category.changeStatus', $category->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="status-{{ $category->id }}" name="status"  {{ $category->status ? 'checked' : '' }} onchange="this.form.submit()">
                                                <label class="custom-control-label" for="status-{{ $category->id }}"></label>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{route('category.edit', $category)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{route('category.destroy', $category)}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" value="{{$category->id}}" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{$categories->links()}}
    </section>

</div>
@endsection
