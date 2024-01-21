@extends('layouts.app')
@section('title','index')
@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0"></h2>
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
    <div class="content-body">
        <!-- Data list view starts -->
        <section id="data-thumb-view" class="data-thumb-view-header">
            <div class="action-btns d-none">
                <div class="btn-dropdown mr-1 mb-1">
                    <div class="btn-group dropdown actions-dropodown">
                     
                       
                    </div>
                </div>
            </div>
            <!-- dataTable starts -->
            <div class="table-responsive">
                <div class="actions action-btns">
                    <div class="btn-group dropdown actions-dropodown">

                    </div>
                    <div class="dt-buttons btn-group">
                        <a class="btn btn-outline-primary" href="{{route('specification.create')}}">
                            <span><i class="feather icon-plus"></i> Add New</span></a>
                    </div>
                </div>
                <table class="table data-thumb-view">
                    <thead>
                        <tr>
                            {{-- <th>products</th> --}}
                            <th>key</th>
                            <th>value</th>
                         </tr>
                    </thead>
                   <tbody>
                    <?php foreach ($models as $one){ ?>
                    <tr>
                    
                        {{-- <td>{{$one->Product->ar_name}}</td> --}}
                        <td>{{$one->key}}</td>
                        <td>{{$one->value}}</td>
                       
                    </tr> 
                    <?php } ?>
                    
                   </tbody>
                </table>
            </div>
            <!-- dataTable ends -->

        </section>
        <!-- Data list view end -->

    </div>


@endsection
    
