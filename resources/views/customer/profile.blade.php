@extends('website.master')

@section('title', 'Customer Profile')

@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Profile</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home.page')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="#">Profile</a></li>
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
                        <a href="{{route('customer.profile')}}" class="list-group-item list-group-item-action bg-primary text-white">Profile</a>
                        <a href="{{route('customer.order')}}" class="list-group-item list-group-item-action">Order</a>
                        <a class="list-group-item list-group-item-action disabled">Account</a>
                        <a class="list-group-item list-group-item-action disabled">Change Password</a>
                        <a class="list-group-item list-group-item-action disabled">Logout</a>
                      </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-body">
                        <h1>My Profile...</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
