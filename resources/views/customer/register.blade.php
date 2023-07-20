@extends('website.master')

@section('title', 'Registration Page')

@section('body')
<div class="breadcrumbs">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-12">
          <div class="breadcrumbs-content">
            <h1 class="page-title">Registration</h1>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <ul class="breadcrumb-nav">
            <li><a href="{{route('home.page')}}"><i class="lni lni-home"></i> Home</a></li>
            <li>Registration</li>
          </ul>
        </div>
      </div>
    </div>
  </div>


  <div class="account-login section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
          <div class="register-form">
            <div class="title">
              <h3>No Account? Register</h3>
              <p>Registration takes less than a minute but gives you full control over your orders.</p>
            </div>
            <form class="row" action="{{route('customer.register')}}" method="POST">
                @csrf
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="reg-fn">Full Name</label>
                  <input class="form-control" type="text" id="reg-fn" name="name" value="{{old('name')}}" required>
                  <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-email">E-mail Address</label>
                  <input class="form-control" type="email" id="reg-email" name="email" value="{{old('email')}}" required>
                  <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-phone">Phone Number</label>
                  <input class="form-control" type="number" id="reg-phone" name="mobile" value="{{old('mobile')}}" required>
                  <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</span>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="reg-pass">Password</label>
                  <input class="form-control" type="password" id="reg-pass" name="password" required>
                  <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                </div>
              </div>
              <div class="button">
                <button class="btn" type="submit">Register</button>
              </div>
            </form>
              <p class="outer-link">Already have an account? <a href="{{route('customer.signin')}}">Login Now</a>
              </p>
            
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
