<?php
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
    <div class="content-body">
        <!-- Data list view starts -->
        <section id="data-thumb-view" class="data-thumb-view-header">
            <div class="action-btns d-none">
                <div class="btn-dropdown mr-1 mb-1">

                </div>
            </div>
            <!-- dataTable starts -->
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="top">
                        <div class="actions action-btns">
                            <div class="btn-group dropdown actions-dropodown">

                            </div>
                            <div class="dt-buttons btn-group">
                            </div>
                        </div>
                        <div class="action-filters">
                            <div class="dataTables_length" id="DataTables_Table_0_length"><label>
                                    <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="4">4</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                    </select>
                                </label>
                            </div>
                            <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                <label><input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label>
                            </div></div></div><div class="clear"></div>
                    <table class="table data-thumb-view dataTable no-footer dt-checkboxes-select" id="DataTables_Table_0" role="grid">
                        <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Full Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Create Date</th>
                        </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($models as $one){ ?>
                                <tr>
                                    <td>{{$one->id}}</td>
                                    <td>{{$one->first_name .' ' .$one->last_name}}</td>
                                    <td>{{$one->phone}}</td>
                                    <td>{{$one->email}}</td>
                                    <td><?= OrderEnum::Labels()[$one->status] ?></td>
                                    <td>{{date(\App\Enums\ConstentsEnum::order_date_format, strtotime($one->created_at))}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary modal1" type="button" data-action="{{ route('order.show', $one) }}">
                                            <i class="fa fa-shopping-bag"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary modal2" type="button" data-action="{{ route('order.change_status', $one) }}">
                                            Change Status
                                        </button>
                                    </td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                    {{$models->links()}}

                       </div>
            <!-- dataTable ends -->
        </section>
        <!-- Data list view end -->

    </div>

    <script src="{{asset('custom/modal.js')}}"></script>
@endsection
