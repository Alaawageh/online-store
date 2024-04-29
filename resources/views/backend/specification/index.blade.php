@extends('layouts.app')
@section('title','Specifications')
@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Specifications</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active">specifications
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrum-right">
            
        </div>
    </div>
</div>
@include('backend.script')

<div class="content-body">
    <section id="data-thumb-view" class="data-thumb-view-header">
        <div class="action-btns d-none">
            <div class="btn-dropdown mr-1 mb-1">
                <div class="btn-group dropdown actions-dropodown">
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <div class="actions action-btns">
                <div class="btn-group dropdown actions-dropodown">
                </div>
                <div class="dt-buttons btn-group">
                    <a class="btn btn-outline-primary" href="{{route('specification.create')}}">
                        <span><i class="feather icon-plus"></i> Add New</span>
                    </a>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{$product->name}}</h4>
                            <i class="feather icon-more-horizontal cursor-pointer"></i>
                        </div>
                        <div class="card-body">
                            <table class="table data-thumb-view dataTable no-footer dt-checkboxes-select">
                                <tbody>
                                <?php foreach ($product->Specifications as $one){ ?>
                                    <tr>
                                        <div class="row">
                                            <td><?= $one->key ?></td>
                                            <td><?= $one->value ?></td>
                                            <td>
                                                <form method="post" action="{{route('specification.destroy', $one)}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" value="{{$one->id}}" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </div>
                                        
                                    </tr>
                                <?php } ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
</div>
@endsection
    
