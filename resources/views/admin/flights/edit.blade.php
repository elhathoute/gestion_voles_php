@extends('layouts.master')

@section('title')
  Edit Flight
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
          <form class="needs-validation" novalidate action="{{ route('flights.update', $flight->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-8">
                <div class="row mb-4">
                    <label for="airline" class="col-sm-3 col-form-label">Flight Number</label>
                    <div class="col-sm-9">
                   <input type="text" class="form-control" id="flight_number" name="flight_number" value="{{ old('price', $flight->flight_number) }}">
                      <div class="valid-feedback">
                        Valid.
                      </div>
                      <div class="invalid-feedback">
                        Flight number is required.
                      </div>
                    </div>
                  </div>
                <div class="row mb-4">
                  <label for="airline" class="col-sm-3 col-form-label">Airline</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="airline" name="airline_id" required>
                      <option value="">None</option>
                      @foreach ($airlines as $key => $value)
                        <option value="{{ $key }}" @selected($key === $flight->airline_id)>{{ $value }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      Good.
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
                      <option value="">None</option>
                      @foreach ($planes as $key => $value)
                        <option value="{{ $key }}" @selected($key === $flight->plane_id)>{{ $value }}</option>
                      @endforeach
                    </select>
                    <div class="valid-feedback">
                      Good.
                    </div>
                    <div class="invalid-feedback">
                      Plane is required.
                    </div>
                  </div>
                </div>

                {{-- time (departure, arrival) --}}
                <div class="row mb-4">
                  <label for="loan_limit" class="col-sm-3 col-form-label">Time</label>
                  <div class="col-sm-9">
                    <div class="input-daterange input-group" id="datepicker" data-date-format="yyyy-m-d" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker'>


 <input type="date" class="form-control filter-input" id="departure" name="departure" placeholder="Departure" />
                      <input type="date" class="form-control filter-input" id="arrival" name="arrival" placeholder="Arrival" />

                      <div class="valid-feedback">
                        Good.
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
                              <option value="{{ $key }}" @selected($key === $flight->origin_id)>{{ $value }}</option>
                            @endforeach
                          </select>
                          <div class="valid-feedback">
                            Good.
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
                              <option value="{{ $key }}" @selected($key === $flight->destination_id)>{{ $value }}</option>
                            @endforeach
                          </select>
                          <div class="valid-feedback">
                            Good.
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
                      <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $flight->price) }}" required>
                      <div class="valid-feedback">
                        Good.
                      </div>
                      <div class="invalid-feedback">
                        Price is required.
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                    <label for="plane" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                      <select class="form-control select2" id="status_id" name="status_id" required>
                        <option value="">None</option>

                          <option value="{{ 1 }}" @selected(1 === $flight->status_id)>Terminé</option>
                          <option value="{{ 2 }}" @selected(2 === $flight->status_id)>En cours</option>
                          <option value="{{ 3 }}" @selected(3 === $flight->status_id)>Programmé</option>



 </select>
                      <div class="valid-feedback">
                        Good.
                      </div>
                      <div class="invalid-feedback">
                        Status is required.
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
  {{-- bootstrap-datepicker --}}
  {{-- <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script> --}}

  <script>
    // ready document
    $(document).ready(function() {
      // init datepicker
      $('.input-daterange').datepicker({
        autoclose: true,
        startDate: new Date()
      });

      //on change airline select
      $('#airline').on('change', function() {
        //get airline id
        let airline_id = $(this).val();
        //if airline id is not empty
        if (airline_id != '') {
          //get planes by airline id
          // before sending an AJAX request reset plane select
          $('#plane').html('');
          $.ajax({
            url: "{{ route('flights.getPlanesByAirline') }}",
            type: "GET",
            data: {
              airline_id: airline_id
            },
            success: function(data) {
              //if data is not empty
              if (data != '') {
                //set plane select2 options
                $('#plane').select2({
                  data: data
                });
              } else {
                $('#plane').select2({
                  data: [{
                    id: '',
                    text: "No plane found"
                  }]
                });
              }
            }
          });
        }
      });

      $('#destination').on('change', function() {
        let destination = $(this).val();
        let origin = $('#origin').val();
        if (origin == destination) {
          swal.fire({
            text: "Origin and destination cannot be the same.",
            icon: "error",
            timer: 1000,
            showCancelButton: false,
            confirmButtonText: "OK",
          }).then((result) => {
            if (result.isConfirmed) {
              $('#destination').val('').trigger('change');
            }
          });
        }
      });
    });
  </script>
@endsection
