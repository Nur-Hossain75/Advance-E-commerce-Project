@extends('website.master')

@section('title', 'Order Page')

@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Order</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home.page')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="#">Order</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="{{route('customer.dashboard')}}" class="list-group-item list-group-item-action">Dashboard</a>
                        <a href="{{route('customer.profile')}}" class="list-group-item list-group-item-action">Profile</a>
                        <a href="{{route('customer.order')}}" class="list-group-item list-group-item-action bg-primary text-white">Order</a>
                        <a class="list-group-item list-group-item-action disabled">Account</a>
                        <a class="list-group-item list-group-item-action disabled">Change Password</a>
                        <a class="list-group-item list-group-item-action disabled">Logout</a>
                      </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-body">
                        <table class="table table-bordered table-hover border-primary">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Order No</th>
                                    <th>Order Date</th>
                                    <th>Order Total</th>
                                    <th>Delivery Address</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->order_date}}</td>
                                        <td>Tk.{{ number_format($order->order_total, 2) }}</td>
                                        <td>{{$order->delivery_address}}</td>
                                        <td>{{$order->order_status}}</td>
                                        <td>
                                            <a href="" class="btn btn-success">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
