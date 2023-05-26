@extends('layouts.master')

@section('title')
  Add Airport
@endsection

@section('content')


  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form class="needs-validation" novalidate action="{{ route('airports.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-8">

                <div class="row mb-4">
                  <label for="name" class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      Name is required.
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="city" class="col-sm-3 col-form-label">City</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="city" name="city_id" required>
                      <option value="">None</option>
                      @foreach ($cities as $key => $value)
                        <option value="{{ $key }}"  @selected($key === old('city_id'))>{{ $value }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      City is required.
                    </div>
                  </div>
                </div>

                <div class="row justify-content-end">
                  <div class="col-sm-9">
                    <div>
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- end card -->
    </div> <!-- end col -->
  </div>
@endsection
