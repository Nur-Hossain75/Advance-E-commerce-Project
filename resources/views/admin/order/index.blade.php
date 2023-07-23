@extends('admin.master')

@section('title','Manage-Category')

@section('body')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Manage Table</h4>
                    <hr/>
                    @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> {{session('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Order No</th>
                                    <th>Order Date</th>
                                    <th>Customer Information</th>
                                    <th>Order Total</th>
                                    <th>Order Status</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $orders as $order )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->customer->name.'('.$order->customer->mobile.')'}}</td>
                                    <td>{{$order->order_total}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>
                                        <a href="{{route('admin.order-detail',['id'=>$order->id])}}" class="btn btn-info btn-sm" title="View Order Detaile">
                                            <i class="ti ti-view-list-alt"></i>
                                        </a>
                                        <a href="{{route('admin.order-edit',['id'=>$order->id])}}" class="btn btn-success btn-sm" title="Edit Order">
                                            <i class="ti ti-palette"></i>
                                        </a>
                                        <a href="{{route('admin.order-invoice',['id'=>$order->id])}}" class="btn btn-primary btn-sm" title="View Order Invoice">
                                            <i class="ti ti-receipt"></i>
                                        </a>
                                        <a href="{{route('admin.print-invoice',['id'=>$order->id])}}" class="btn btn-warning btn-sm" title="Print Order Invoice">
                                            <i class="ti ti-printer"></i>
                                        </a>
                                        <a href="{{route('admin.order-delete',['id'=>$order->id])}}" class="btn btn-danger btn-sm" title="Delete Order" onclick="return confirm('Are you sure?')">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

