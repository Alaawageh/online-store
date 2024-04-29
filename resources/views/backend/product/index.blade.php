@extends('layouts.app')
@section('title', 'Products')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Products</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Products
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
        
        <div class="table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="top">
                    <div class="actions action-btns">
                        <div class="dt-buttons btn-group">
                            <a class="btn btn-outline-primary" href="{{route('product.create')}}">
                                <span><i class="feather icon-plus"></i> Add New</span>
                            </a>
                        </div>
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
                                <th>Price</th>
                                <th>Status</th>
                                <th scope="col" width="1%" colspan="3">Action</th>    
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php foreach ($products as $product){ ?>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        <img class="img-lg" src="{{ asset($product->image) }}">
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>
                                        <form action="{{ route('product.changeStatus', $product->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="status-{{ $product->id }}" name="status"  {{ $product->status ? 'checked' : '' }} onchange="this.form.submit()">
                                                <label class="custom-control-label" for="status-{{ $product->id }}"></label>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{route('product.show', $product)}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{route('product.edit', $product)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{route('product.destroy', $product)}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" value="{{$product->id}}" class="btn btn-sm btn-danger">
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
        {{$products->links()}}

    </section>
</div>
@endsection
