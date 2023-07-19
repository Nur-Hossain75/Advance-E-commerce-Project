@extends('website.master')

@section('title', 'Check Out Page')

@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home.page')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul class="nav nav-pills">
                            <li><a href="" class="nav-link active" data-bs-target="#cash" data-bs-toggle="pill">Cash On Delivery</a></li>
                            <li><a href="" class="nav-link" data-bs-target="#online" data-bs-toggle="pill">Online Pyment</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="cash">
                                <form action="{{route('checkout.new-cash-order')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>User Name</label>
                                                <div class="col-md-12 form-input form">
                                                    @if (isset($customer->id))
                                                        <input type="text" required name="name" value="{{$customer->name}}" readonly placeholder="Full Name"/>
                                                    @else
                                                        <input type="text" required name="name" value="{{old('name')}}" placeholder="Full Name"/>
                                                        <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Email Address</label>
                                                <div class="form-input form">
                                                    @if (isset($customer->id))
                                                        <input type="email" required name="email" value="{{$customer->email}}" readonly placeholder="Email Addreass"/>
                                                    @else
                                                        <input type="email" required name="email" value="{{old('email')}}" placeholder="Email Address"/>
                                                        <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Phone Number</label>
                                                <div class="form-input form">
                                                    @if (isset($customer->id))
                                                        <input type="number" required name="mobile" value="{{$customer->mobile}}" readonly placeholder="Phone Number"/>
                                                    @else
                                                        <input type="number" required name="mobile" value="{{old('mobile')}}" placeholder="Phone Number"/>
                                                        <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Delivery Address</label>
                                                <div class="form-input form">
                                                    <textarea name="delivery_address" style="padding-top: 10px; height:100px" placeholder="Order Delivery Address">{{old('delivery_address')}}</textarea>
                                                    <span class="text-danger">{{$errors->has('delivery_address') ? $errors->first('delivery_address') : ''}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Payment Type</label>
                                                <div class="">
                                                    <label><input type="radio" name="payment_type" checked value="1"> Cash On Delivery</label>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <div class="single-checkbox checkbox-style-3">
                                                <input type="radio" id="" name="payment_type" checked value="1">
                                                <label for=""><span></span></label>
                                                <p>Cash On Delivery</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-checkbox checkbox-style-3">
                                                <input type="checkbox" id="checkbox-3" checked>
                                                <label for="checkbox-3"><span></span></label>
                                                <p>I accept all terms & condition.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form button">
                                                <button type="submit" class="btn">Confirm Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade show px-3" id="online">
                                <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="firstName">Full name</label>
                                            <input type="text" name="name" class="form-control" id="customer_name" placeholder="Full Name" required>
                                            <div class="invalid-feedback">
                                                Valid customer name is required.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="mobile">Mobile</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">+88</span>
                                            </div>
                                            <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Phone Number" required>
                                            <div class="invalid-feedback" style="width: 100%;">
                                                Your Mobile number is required.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid email address for shipping updates.
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="delivery_address" id="address" placeholder="Delivery Address" required></textarea>
                                        <div class="invalid-feedback">
                                            Please enter your shipping address.
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label for="country">Country</label>
                                            <select class="custom-select d-block form-control w-100" id="country" required>
                                                <option value="">Choose...</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a valid country.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="state">State</label>
                                            <select class="custom-select d-block form-control w-100" id="state" required>
                                                <option value="">Choose...</option>
                                                <option value="Dhaka">Dhaka</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="zip">Zip</label>
                                            <input type="text" class="form-control" id="zip" placeholder="" required>
                                            <div class="invalid-feedback">
                                                Zip code required.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-checkbox checkbox-style-3">
                                            <input type="radio" id="" name="payment_type" checked value="2">
                                            <label for=""><span></span></label>
                                            <p>Cash On Delivery</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-checkbox checkbox-style-3">
                                            <input type="checkbox" id="checkbox-33" checked>
                                            <label for="checkbox-33"><span></span></label>
                                            <p>I accept all terms & condition.</p>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table">
                            <h5 class="title">Shopping Cart Summery</h5>
                            <div class="sub-total-price">
                                @php($total=0)
                               @foreach (ShoppingCart::all() as $item)
                               <div class="total-price">
                                <p class="value">{{$item->name}} ({{$item->price}}*{{$item->qty}}):</p>
                                <p class="price">৳{{$item->price*$item->qty}}</p>
                            </div>
                            @php($total=$total+($item->price*$item->qty))
                               @endforeach
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">৳{{$total}}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Tax(15%):</p>
                                    <p class="price">৳{{$tax=round((($total*15)/100))}}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Shippng Amount:</p>
                                    <p class="price">৳{{$shipping=100}}</p>
                                </div>
                                <div class="total-payable">
                                    <div class="payable-price">
                                        <p class="value">Total Payable:</p>
                                        <p class="price">৳{{$orderTotal = $total+$tax+$shipping}}</p>
                                    </div>
                                    <?php
                                        Session::put('order_total',$orderTotal);
                                        Session::put('tax_total',$tax);
                                        Session::put('shipping_total',$shipping);
                                    ?>
                                </div>
                            </div>
                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{ asset('/') }}website/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
