@extends('layouts.master')

@section('title')
  Edit Plane
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
          <form class="needs-validation" novalidate action="{{ route('planes.update', $plane->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-8">

                <div class="row mb-4">
                  <label for="name" class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $plane->name) }}" required>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      Name is required.
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="airline" class="col-sm-3 col-form-label">Airline</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="airline" name="airline_id" required>
                      <option value="" selected>None</option>
                      @foreach ($airlines as $key => $value)
                        <option value="{{ $key }}" @selected($key === $plane->airline_id)>{{ $value }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      Airline is required.
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="code" class="col-sm-3 col-form-label">Code</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $plane->code) }}" required>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      Code is required.
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="capacity" class="col-sm-3 col-form-label">Capacity</label>
                  <div class="col-sm-9">
                    <input type="number" min="80" max="300" class="form-control" id="capacity" name="capacity" value="{{ old('capacity', $plane->capacity) }}" required>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      Capacity is required.
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
