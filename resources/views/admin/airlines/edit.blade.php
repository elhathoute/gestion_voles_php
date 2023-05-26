@extends('layouts.master')

@section('title')
   Edit Airline
@endsection


@section('plugin-css')
  <!-- Dropzone -->
  <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
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
          <form class="needs-validation" novalidate action="{{ route('airlines.update', $airline->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-8">

                <div class="row mb-4">
                  <label for="name" class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $airline->name) }}" required>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      Name is required.
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="code" class="col-sm-3 col-form-label">Code</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $airline->code) }}" required>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      Code is required.
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="logo" class="col-sm-3 col-form-label">Logo</label>
                  <div class="col-sm-9" id="upload">
                    <div id="myDropzone" class="dropzone">
                      <div class="dz-message needsclick">
                        <div class="mb-3">
                          <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                        </div>
                        <h4>Drop your file here</h4>
                      </div>
                    </div>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      Logo is required.
                    </div>
                  </div>
                </div>

                <div class="row justify-content-end">
                  <div class="col-sm-9">
                    <div>
                      <button class="btn btn-primary" type="submit">Update</button>
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

@section('script')
  <!-- Dropzone js -->
  <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
  {{-- Dropzone Config --}}
  <script src="{{ URL::asset('assets/js/dropzone-config.js') }}"></script>
@endsection
