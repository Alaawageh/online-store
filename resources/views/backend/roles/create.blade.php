@extends('layouts.app')
@section('title','Create Role')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Create Role</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Roles
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
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form method="POST" action="{{ route('roles.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input value="{{ old('name') }}" 
                                        type="text" 
                                        class="form-control" 
                                        name="name" 
                                        placeholder="Name" required>
                                </div>
                
                                <label for="permissions" class="form-label">Assign Permissions</label>
                
                                <table class="table table-striped">
                                    <thead>
                                        <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                                        <th scope="col" width="20%">Name</th>
                                        <th scope="col" width="1%">Guard</th> 
                                    </thead>
                
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td>
                                                <input type="checkbox" 
                                                name="permission[{{ $permission->name }}]"
                                                value="{{ $permission->name }}"
                                                class='permission'>
                                            </td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->guard_name }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="{{asset('custom/check_all.js')}}"></script>
@endsection
