@extends('layouts.master-without-nav')

@section('title')
  Register
@endsection

@section('body')
  <body>
@endsection

@section('content')
  <div class="account-pages pt-sm-5 my-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-6">
          <div class="card overflow-hidden">
            <div class="card-body pt-0">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <div class="p-2">
                <form class="needs-validation" novalidate method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name='name' placeholder="Enter name" value="{{ old('name') }}" required>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid name.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name='email' placeholder="Enter email" value="{{ old('email') }}" required>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid email.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name='phone' placeholder="Enter phone" value="{{ old('phone') }}" required>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid phone number.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name='address' placeholder="Enter address" value="{{ old('address') }}" required>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid address.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      Please enter a valid password.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter password Again" required>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      Please confirm your password.
                    </div>
                  </div>

                  {{-- type of user (customer or adminAirplan) --}}
                  <div class="mb-3">
                    <label for="user_role" class="form-label">User Role</label>
                    <select class="form-control" id="user_role" name="user_role" required>
                      <option value="0">Customer</option>
                      <option value="2">AirplaneAdmin</option>
                    </select>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      Please select a valid user role.
                    </div>
                  </div>

                  <div class="d-grid mt-4">
                    <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="mt-5 text-center">
            <div>
              <p>Already have an account? <a href="{{ route('login') }}" class="fw-medium text-primary">Login</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


