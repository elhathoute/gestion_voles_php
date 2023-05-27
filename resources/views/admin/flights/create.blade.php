@extends('layouts.master')

@section('title')
  Add Flight
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
          <form class="needs-validation" novalidate action="{{ route('flights.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-8">
                <div class="row mb-4">
                    <label for="airline" class="col-sm-3 col-form-label">N° Flight </label>
                    <div class="col-sm-9">
                   <input type="text" class="form-control" id="flight_number" name="flight_number">
                      <div class="valid-feedback">
                        Valid.
                      </div>
                      <div class="invalid-feedback">
                        N° is required.
                      </div>
                    </div>
                  </div>

                <div class="row mb-4">
                  <label for="airline" class="col-sm-3 col-form-label">Airline</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="airline" name="airline_id" required>
                      <option value="">None</option>
                      @foreach ($airlines as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
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

                {{-- planes --}}
                <div class="row mb-4">
                  <label for="plane" class="col-sm-3 col-form-label">Plane</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="plane" name="plane_id" required>
                    @foreach ($planes as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                    <div class="valid-feedback">
                      Valid.
                    </div>
                    <div class="invalid-feedback">
                      Plane is required.
                    </div>
                  </div>
                </div>

                {{-- time (departure, arival) --}}
                <div class="row mb-4">
                  <label for="loan_limit" class="col-sm-3 col-form-label">Time</label>
                  <div class="col-sm-9">
                    <div class="input-daterange input-group" id="datepicker" data-date-format="yyyy-m-d" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker'>
                      <input type="date" class="form-control filter-input" id="departure" name="departure" placeholder="Departure" required />
                      <input type="date" class="form-control filter-input" id="arrival" name="arrival" placeholder="Arrival" required />

                      <div class="valid-feedback">
                        Valid.
                      </div>
                      <div class="invalid-feedback">
                        Time is required.
                      </div>
                    </div>
                  </div>
                </div>

                {{-- route (origin, destination) --}}
                <div class="row mb-4">
                  <label for="loan_limit" class="col-sm-3 col-form-label">Route</label>
                  <div class="col-sm-9">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="origin" class="col-sm-3 col-form-label">Origin</label>
                          <select class="form-control select2" id="origin" name="origin_id" required>
                            <option value="">None</option>
                            @foreach ($airports as $key => $value)
                              <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                          </select>
                          <div class="valid-feedback">
                            Valid.
                          </div>
                          <div class="invalid-feedback">
                            Origin is required.
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="destination" class="col-sm-3 col-form-label">Destin</label>
                          <select class="form-control select2" id="destination" name="destination_id" required>
                            <option value="">None</option>
                            @foreach ($airports as $key => $value)
                              <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                          </select>
                          <div class="valid-feedback">
                            Valid.
                          </div>
                          <div class="invalid-feedback">
                            Destination is required.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- price --}}
                <div class="row mb-4">
                  <label for="price" class="col-sm-3 col-form-label">Price</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="input-group-text">$</div>
                      <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                      <div class="valid-feedback">
                        Valid.
                      </div>
                      <div class="invalid-feedback">
                        Price is required.
                      </div>
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


@section('script')
  <!-- Dropzone js -->
  <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
  {{-- Dropzone Config --}}
  <script src="{{ URL::asset('assets/js/dropzone-config.js') }}"></script>
@endsection
