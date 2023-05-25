@extends('layouts.master-without-nav')

@section('title')
  Login
@endsection

@section('body')
  <body>
@endsection

@section('content')
  <div class="account-pages pt-sm-5 my-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
          <div class="card overflow-hidden">
            <div class="card-body pt-0">
              <div class="auth-logo">
                <a href="index" class="auth-logo-light">
                  <div class="avatar-md profile-user-wid mb-4">
                    <span class="avatar-title rounded-circle bg-light">
                      <img src="{{ URL::asset('/assets/images/logo-light.svg') }}" alt="" class="rounded-circle" height="34">
                    </span>
                  </div>
                </a>
              </div>
              <div class="p-2">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', 'admin@airline.com') }}" id="email" placeholder="Enter Email" autocomplete="email" autofocus>
                    @error('email')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" value="password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                      @error('password')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                

                  <div class="d-grid mt-3">
                    <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="mt-5 text-center">
            <div>
              <p>Don't have an account? <a href="{{ route('register') }}" class="fw-medium text-primary">Signup now</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end account-pages -->
@endsection

