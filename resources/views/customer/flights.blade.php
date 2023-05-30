@extends('layouts.master')

@section('title')
  @lang('translation.flight.flight')
@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 border border-dark rounded p-3">
                    <form method="POST" action="{{ route('search-flight') }}">
                        @csrf
                        <div class="form-group">
                          <label for="flight_number">Num de vol</label>

                           {{-- <input type="text" class="form-control" id="flight_number" name="flight_number" value="{{ old('flight_number') }}"> --}}
                           <input type="text" class="form-control fw-bold" id="flight_number" name="flight_number" @isset($request) value=" {{ old('flight_number', $request->input('flight_number')) }} " @endisset>

                        </div>
                        <div class="mt-3 text-center">
                          <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i> Search
                          </button>
                        </div>
                      </form>



                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3 border border-dark rounded p-3">
                    <form method="POST" action="{{ route('search-flight') }}">
                        @csrf

                        @php
                        $compagnies = DB::table('airlines')->get();
                        // cmp ipa
                        $compagnies_ipa = DB::table('ipa_flights')->select('airline_icao','id')->get();

                        $airports = DB::table('airports')->get();
                        // airoport ipa
                        $airports_ipa = DB::table('ipa_flights')->select('arr_icao','dep_icao','id')->get();

                        $province_destnation = DB::table('cities')->get();

                         @endphp

                        <div class="form-group">
                            <label for="airline">Compagnie</label>
                            <select class="form-control fw-bold" id="compagnie" name="compagnie">
                                <option value="0" selected>select Compagnie</option>
                                @foreach($compagnies as $company)
                                    <option value="{{ $company->id }}" @isset($request) {{ (old('compagnie', $request->input('compagnie')) == $company->id) ? 'selected' : '' }}@endisset>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                                @foreach($compagnies_ipa as $company_ipa)
                                <option value="{{ $company_ipa->airline_icao }}" @isset($request) {{ (old('compagnie', $request->input('compagnie')) == $company_ipa->id) ? 'selected' : '' }}@endisset>
                                    {{ $company_ipa->airline_icao }}
                                </option>
                            @endforeach
                            </select>


                        </div>
                        <div class="form-group">

                            <label for="airport">Aéroport</label>
                            <select class="form-control fw-bold" id="airport" name="airport">
                                <option value="0" selected>select Aéroport</option>
                                @foreach($airports as $airport)
                                    <option  value="{{ $airport->id }}"  @isset($request) {{ (old('airport', $request->input('airport')) == $airport->id) ? 'selected' : '' }} @endisset>

                                        {{ $airport->name }}</option>
                                @endforeach
                                @foreach($airports_ipa as $airport_ipa)
                                <option  value="{{ $airport_ipa->arr_icao }}"  @isset($request) {{ (old('airport', $request->input('airport')) == $airport_ipa->id) ? 'selected' : '' }} @endisset> {{ $airport_ipa->arr_icao }}</option>
                                <option  value="{{ $airport_ipa->dep_icao }}"  @isset($request) {{ (old('airport', $request->input('airport')) == $airport_ipa->id) ? 'selected' : '' }} @endisset> {{ $airport_ipa->dep_icao }}</option>
                            @endforeach
                            </select>

                        </div>
                        <div class="mt-3 text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-1"></div>


                <div class="col-md-4 border border-dark rounded p-3 ">
                    <form method="POST" action="{{ route('search-flight') }}">
                        @csrf
                        <div class="form-group">
                            <label for="provenance">SEARCH BY PROVENANCE OR DESTINATION</label>
                            <select class="form-control fw-bold" id="provonance" name="provonance">
                                <option value="0" selected>select  PROVENANCE OR DESTINATION</option>
                                @foreach($province_destnation as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3 text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>

  <div class="row" id="flight-container1">
    @if($customer_flights->count()>0)
      @foreach ($customer_flights as $flight)
    <div class="col-md-4 bg-secondary"  >
        <div class="card shadow-lg rounded">
            <div class="card-body">
                <p> <span class="badge bg-secondary me-1 fw-bold"> Flight Number</span>: {{ $flight['flight_number'] }}</p>
                <p> <span class="badge bg-secondary me-1 fw-bold"> Airline </span>: {{ $flight->airline->name }}</p>
                <p> <span class="badge bg-secondary me-1 fw-bold"> Plane  </span>:{{ $flight->plane->code}}</p>
                <p> <span class="badge bg-secondary me-1 fw-bold"> Origin </span>: {{ $flight->origin->name }}</p>
                <p> <span class="badge bg-secondary me-1 fw-bold"> Destination </span>: {{ $flight->destination->name }}</p>
                <p> <span class="badge bg-secondary me-1 fw-bold"> Departure</span>: {{ $flight['departure'] }}</p>
                <p> <span class="badge bg-secondary me-1 fw-bold"> Arrival</span>: {{ $flight['arrival'] }}</p>
                <p> <span class="badge bg-secondary me-1 fw-bold"> Seats </span>:<i class="bx bx-user text-primary bx-sm"></i>{{ $flight['seats'] }}</p>
                <p> <span class="badge bg-secondary me-1 fw-bold"> Remaining Seats</span>:<i class="bx bx-user text-primary bx-sm"></i> {{ $flight['remain_seats'] }}</p>
                <p> <span class="badge bg-secondary me-1 fw-bold"> Status </span>:


                    @if( $flight->status->id == 2 )
                    <span class="badge bg-success" >{{ $flight->status->name ?? 'N/A' }}</span >  <i class="bx bxs-plane-take-off text-success bx-sm"></i>
                    @elseif( $flight->status->id == 3 )
                    <span class="badge bg-primary" >{{ $flight->status->name ?? 'N/A' }}</span > <i class="bx bxs-plane-take-off text-primary bx-sm"></i>
                    @else
                    <span  class="badge bg-danger">{{ $flight->status->name ?? 'N/A' }}</span > <i class="bx bxs-plane-take-off text-danger bx-sm"></i>
                    @endif
                </p>

                {{-- <p> <span class="badge bg-secondary me-1 fw-bold"> Price</span>: {{ $flight['price'] }} <strong>DH</strong> </p> --}}
                <div class="text-center">
                    <a href="https://fr.flightaware.com/live/{{ $flight->destination->name }}" class="btn btn-primary">View</a>
                </div>

            </div>
        </div>

    </div> <!-- end col -->


    @endforeach
    @else
    <div class="text-center text-danger">
        <p>  Not Found</p>
      </div>
      @endif
    <div class="row">
      <div class="col-md-12">
          <nav aria-label="Flight Pagination ">
            <ul class="pagination pagination-sm">
                  {{ $customer_flights->links('pagination::bootstrap-5') }}
              </ul>
          </nav>
      </div>
    </div>

  </div>
  <div class="row" id="flight-container2">
    @if($ipa_flights->count()>0)
      @foreach ($ipa_flights as $flight)
    <div class="col-md-4 bg-warning">
    <div class="card shadow-lg rounded">
        <div class="card-body">
          <p><span class="badge bg-secondary me-1 fw-bold">Flight Number</span>: {{ $flight->flight_number }}</p>
          <p><span class="badge bg-secondary me-1 fw-bold">Airline </span>: {{ $flight->airline_icao }}</p>
          <p><span class="badge bg-secondary me-1 fw-bold">Plane </span>: {{ $flight->aircraft_icao }}</p>
          <p><span class="badge bg-secondary me-1 fw-bold">Origin </span>: {{ $flight->dep_icao }}</p>
          <p><span class="badge bg-secondary me-1 fw-bold">Destination </span>: {{ $flight->arr_icao }}</p>
          <p><span class="badge bg-secondary me-1 fw-bold">Departure</span>: {{ $flight->dep_iata }}</p>
          <p><span class="badge bg-secondary me-1 fw-bold">Arrival</span>: {{ $flight->arr_iata }}</p>
          <p><span class="badge bg-secondary me-1 fw-bold">Seats</span>: <i class="bx bx-user text-primary bx-sm"></i>
          {{  ($flight->seats) ?  ($flight->seats) : ''}}

            </p>
          <p><span class="badge bg-secondary me-1 fw-bold">Remaining Seats</span>: <i class="bx bx-user text-primary bx-sm"></i>
           {{ ($flight->remain_seats) ?  ($flight->remain_seats) : ''}}
          <p><span class="badge bg-secondary me-1 fw-bold">Status</span>:
          @if($flight->status == 'en-route')
            <i class="bx bxs-plane-take-off text-success bx-sm"></i>
            @else
            <span></span>
            </p>
            @endif
          <div class="text-center">
            <a href="https://fr.flightaware.com/live/flight/{{$flight->arr_icao}}" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    @else
    <div class="text-center text-danger">
        <p>  Not Found</p>
      </div>
      @endif
    <div class="row">
      <div class="col-md-12">
          <nav aria-label="Flight Pagination ">
            <ul class="pagination pagination-sm">
                  {{ $ipa_flights->links('pagination::bootstrap-5') }}
              </ul>
          </nav>
      </div>
    </div>
  </div>


@endsection

@section('script')
<script >
    const apiUrl = 'https://airlabs.co/api/v9/flights?api_key=27a5680b-53a7-429c-89f3-26d21d95d9b8';
    // const apiUrl = 'https://airlabs.co/api/v9/nearby?lat=33.3675003&lng=-7.5899701&distance=13.456&api_key=27a5680b-53a7-429c-89f3-26d21d95d9b8';
    // const apiUrl = 'https://airlabs.co/api/v9/cities?city_code=CAS&api_key=27a5680b-53a7-429c-89f3-26d21d95d9b8';


fetch(apiUrl)
.then(response => response.json())
.then(data => {

const flightArray = [];

for (let i = 0; i < Math.min(data.response.length, 3); i++) {
  const flight = data.response[i];
  flightArray.push(flight);
//   const flightContainer = $('#flight-container2');

// const cardDiv = document.createElement('div');
// cardDiv.className = 'col-md-4 bg-warning';
// cardDiv.innerHTML = `
//   <div class="card shadow-lg rounded">
//     <div class="card-body">
//       <p><span class="badge bg-secondary me-1 fw-bold">Flight Number</span>: ${flight.flight_number}</p>
//       <p><span class="badge bg-secondary me-1 fw-bold">Airline </span>: ${flight.airline_icao}</p>
//       <p><span class="badge bg-secondary me-1 fw-bold">Plane </span>: ${flight.aircraft_icao}</p>
//       <p><span class="badge bg-secondary me-1 fw-bold">Origin </span>: ${flight.dep_icao}</p>
//       <p><span class="badge bg-secondary me-1 fw-bold">Destination </span>: ${flight.arr_icao}</p>
//       <p><span class="badge bg-secondary me-1 fw-bold">Departure</span>: ${flight.dep_iata}</p>
//       <p><span class="badge bg-secondary me-1 fw-bold">Arrival</span>: ${flight.arr_iata}</p>
//       <p><span class="badge bg-secondary me-1 fw-bold">Seats</span>: <i class="bx bx-user text-primary bx-sm"></i>
//         ${flight.seats ?  flight.seats : ''}

//         </p>
//       <p><span class="badge bg-secondary me-1 fw-bold">Remaining Seats</span>: <i class="bx bx-user text-primary bx-sm"></i>
//         ${flight.remain_seats ?  flight.seats : ''}
//       <p><span class="badge bg-secondary me-1 fw-bold">Status</span>:
//         ${flight.status === 'en-route' ? '<i class="bx bxs-plane-take-off text-success bx-sm"></i>' : ''}${flight.status}</p>
//       <div class="text-center">
//         <a href="https://fr.flightaware.com/live/flight/${flight.arr_icao}" class="btn btn-primary">View</a>
//       </div>
//     </div>
//   </div>
// `;


// flightContainer.append(cardDiv);

  console.log(flightArray);

}
$(document).ready(function() {
  setTimeout(function() {
    $.ajax({
      url: '{{ route('flights.ipa.insert') }}',
      method: 'GET',
      data: { flightArray: flightArray },
      success: function(response) {
        console.log(response);
      },
      error: function(error) {
        console.log(error);
      }
    });
  }, 1000); // Delay the execution for 3 seconds (3000 milliseconds)
});
})
.catch(error => {
// Handle any errors that occurred during the request
console.error('Error:', error);
});

</script>
@endsection
