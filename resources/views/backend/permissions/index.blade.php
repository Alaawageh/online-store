@extends('layouts.app')
@section('title','Permission')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Permissions</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Permissions
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
            </div>
        </div>
        
        <div class="table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="top">
                    <div class="actions action-btns">
                        <div class="dt-buttons btn-group">
                            <a class="btn btn-outline-primary" href="{{ route('permissions.create') }}">
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
                                <th scope="col" width="15%">Name</th>
                                <th scope="col">Guard</th> 
                                <th scope="col" colspan="3" width="1%"></th> 
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->guard_name }}</td>
                                        <td><a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                                        <td>
                                            {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection