@extends('layouts.app')
@section('title', 'DashBoard')
@section('content')

<section id="dashboard-analytics">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card bg-analytics text-white">
                <div class="card-content">
                    <div class="card-body text-center">
                        <img src="{{asset('/app-assets/images/elements/decore-left.png')}}" class="img-left" alt="card-img-left">
                        <img src="{{asset('/app-assets/images/elements/decore-right.png')}}" class="img-right" alt="card-img-right">
                        <div class="avatar avatar-xl bg-primary shadow mt-0">
                            <div class="avatar-content">
                                <i class="feather icon-award white font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-2 text-white">Congratulations {{Auth::user()->name}},</h1>
                            <p class="m-auto w-75">You have done <strong>{{$data['sales']}}</strong> more sales today. Check your new badge in your profile.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-users text-primary font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1 mb-25">{{$data['users']}}</h2>
                    <p class="mb-0">Subscribers Gained</p>
                </div>
                <div class="card-content">
                    <div id="subscribe-gain-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-package text-warning font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1 mb-25">{{$data['orders']}}</h2>
                    <p class="mb-0">Orders Received</p>
                </div>
                <div class="card-content">
                    <div id="orders-received-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row match-height">
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between pb-0">
                    <h4>Orders</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        {{-- <div id="product-order-chart" class="mb-3"></div> --}}
                        <div class="chart-info d-flex justify-content-between mb-1">
                            <div class="series-info d-flex align-items-center">
                                <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                <span class="text-bold-600 ml-50">Finished</span>
                            </div>
                            <div class="product-result">
                                <span>{{$data['finished']}}</span>
                            </div>
                        </div>
                        <div class="chart-info d-flex justify-content-between mb-1">
                            <div class="series-info d-flex align-items-center">
                                <i class="fa fa-circle-o text-bold-700 text-warning"></i>
                                <span class="text-bold-600 ml-50">Pending</span>
                            </div>
                            <div class="product-result">
                                <span>{{$data['pending']}}</span>
                            </div>
                        </div>
                        <div class="chart-info d-flex justify-content-between mb-75">
                            <div class="series-info d-flex align-items-center">
                                <i class="fa fa-circle-o text-bold-700 text-danger"></i>
                                <span class="text-bold-600 ml-50">Rejected</span>
                            </div>
                            <div class="product-result">
                                <span>{{$data['Rejected']}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Top Salles</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <ul class="activity-timeline timeline-left list-unstyled">
                            @foreach ($data['topSalles'] as $one)
                            <li>
                                <div class="timeline-info">
                                    <p class="font-weight-bold mb-0">{{$one->product?->name}}</p>
                                    <span class="font-small-3">{{$one?->QTY}}</span>
                                </div>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Top Rating</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <ul class="activity-timeline timeline-left list-unstyled">
                            @foreach ($data['topRating'] as $one)
                            <li>
                                <div class="timeline-info">
                                    <p class="font-weight-bold mb-0">{{$one->product->name}}</p>
                                    <span class="font-small-3">{{round($one->average_rating , 1)}}</span>
                                </div>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Dashboard Analytics end -->
@endsection