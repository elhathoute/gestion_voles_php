@extends('layouts.master')

@section('title')
  Add rapport
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
          <form class="needs-validation" novalidate action="{{ route('customer.rapport.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-8">

                <div class="row mb-4">
                  <label for="name" class="col-sm-3 col-form-label">Name rapport</label>
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
                  <label for="logo" class="col-sm-3 col-form-label">Rapport</label>
                  <div class="col-sm-9" id="upload">
                   <input type="file" name="file" id="">
                  </div>
                </div>

                <div class="row justify-content-end">
                  <div class="col-sm-9">
                    <div class="row">

                      <button class="btn btn-primary m-2" type="submit">Submit</button>
</form>
                    <form action="{{ route('customer.rapport.destroy') }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete all rapports</button>
                    </form>
                    </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

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
