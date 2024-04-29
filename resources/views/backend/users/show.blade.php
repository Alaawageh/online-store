@extends('layouts.app')
@section('title','Show User')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Show User</h2>
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
<div class="content-body">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="container mt-4">
                                <div class="mb-3">
                                    Name: {{ $user->name }}
                                </div>
                                <div class="mb-3">
                                    Email: {{ $user->email }}
                                </div>
                                <div class="mb-3">
                                    @foreach ($user->roles as $role)
                                        Role: {{$role->name}}

                                    @endforeach
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route('users.index') }}" class="btn btn-info">Back</a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection