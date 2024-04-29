<?php
use App\Enums\PaymentEnum;
use App\Enums\OrderEnum;
?>
@extends('layouts.app')
@section('title', 'Orders')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Orders</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Orders
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
                        <div class="btn-group dropdown actions-dropodown">

                        </div>
                        <div class="dt-buttons btn-group">
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="card">
                        <table class="table data-thumb-view dataTable no-footer dt-checkboxes-select" id="DataTables_Table_0" role="grid">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Full Name</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Payment Status</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Change Status</th>
                                    <th>Details</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($orders as $one){ ?>
                                    <tr>
                                        <td>{{$one->id}}</td>
                                        <td>{{$one->first_name .' ' .$one->last_name}}</td>
                                        <td>{{$one->phone}}</td>
                                        <td><?= OrderEnum::Labels()[$one->status] ?></td>
                                        <td><?= PaymentEnum::Labels()[$one->payment_status] ?></td>
                                        <td>{{date(\App\Enums\ConstentsEnum::order_date_format, strtotime($one->created_at))}}</td>
                                        <td>{{date(\App\Enums\ConstentsEnum::order_time_format, strtotime($one->created_at))}}</td>

                                        <td>
                                            <button class="btn btn-sm btn-primary modal2" type="button" data-action="{{ route('order.change_status', $one) }}">
                                                Change Status
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-primary modal1" type="button" data-action="{{ route('order.show', $one) }}">
                                                <i class="fa fa-shopping-bag"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{route('order.destroy', $one)}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" value="{{$one->id}}" class="btn btn-sm btn-danger">
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
        {{$orders->links()}}
    </section>
</div>

<script src="{{asset('custom/modal.js')}}"></script>
 
@endsection
