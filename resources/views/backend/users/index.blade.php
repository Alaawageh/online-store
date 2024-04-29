@extends('layouts.app')
@section('title','Users')
@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Users</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Users
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
                            <a class="btn btn-outline-primary" href="{{ route('users.create') }}">
                                <span><i class="feather icon-plus"></i> Add New</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="card">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" width="1%">#</th>
                                <th scope="col" width="15%">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col" width="10%">Roles</th>
                                <th scope="col" width="1%" colspan="3"></th>    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            <span class="badge bg-info">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a></td>
                                    <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
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
    <div class="d-flex">
        {!! $users->links() !!}
    </div>
</div>
@endsection