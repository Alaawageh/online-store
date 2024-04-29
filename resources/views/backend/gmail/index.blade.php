@extends('layouts.app')
@section('content-area')
<div class="content-area-wrapper">
    <div class="sidebar-left">
        <div class="sidebar">
            <div class="sidebar-content email-app-sidebar d-flex">
                <span class="sidebar-close-icon">
                    <i class="feather icon-x"></i>
                </span>
                <div class="email-app-menu">
                    <div class="form-group form-group-compose text-center compose-btn">
                        <button type="button" class="btn btn-primary btn-block my-2" data-toggle="modal" data-target="#composeForm"><i class="feather icon-edit"></i> Compose</button>
                    </div>
                    <div class="sidebar-menu-list">
                        <div class="list-group list-group-messages font-medium-1 notify">
                            <a href="#" class="list-group-item list-group-item-action border-0 pt-0 active">
                                <i class="font-medium-5 feather icon-mail mr-50"></i> Inbox <span data-count="{{$count}}" class="badge badge-primary badge-pill float-right notif-count">{{$count}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="content-right">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="app-content-overlay"></div>
                <div class="email-app-area notify">
                    <!-- Email list Area -->
                    <div class="email-app-list-wrapper ">
                        <div class="email-app-list">
                            <div class="app-action">
                            </div>
                            <div class="email-user-list list-group ">
                                <ul class="users-list-wrapper media-list list">
                                    @foreach ($emails as $email)
                                        <li data-id="{{ $email->id}}" class="media mail-read" style="{{ $email->reader_status ? 'background-color: #FFFFFF;' : 'background-color: #DAE1E7;color: black' }}">
                                        <div class="media-left pr-50">
                                            <div class="avatar">
                                                <img class="avatar-content" src="" alt="avtar img holder">
                                            </div>
                                            <div class="user-action">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="user-details">
                                                <div class="mail-items">
                                                    <h5 class="list-group-item-heading mb-25 {{ $email->reader_status ? '' : 'text-bold-600' }}">{{$email->order?->first_name}}</h5>
                                                </div>
                                                <div class="mail-meta-item">
                                                    <span class="float-right">
                                                        <span class="mr-1 bullet bullet-success bullet-sm"></span>
                                                        <span class="mail-date">
                                                            {{$email->created_at}}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mail-message">
                                                <p class="list-group-item-text truncate mb-0">
                                                  <strong> New Order For More Details</strong>  
                                                </p>
                                            </div>
                                        </div>
                                    </li> 
                                    @endforeach 
                                </ul>
                                <div class="no-results">
                                    <h5>No Items Found</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Email list Area -->
                    <div id="Details" class="email-app-details">
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="{{asset('custom/emails.js')}}"></script>
@endsection
