@extends('layouts.master')

@section('title')
  Dashboard
@endsection

@section('css')
  <!-- Lightbox css -->
  <link href="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('content')


  <div class="row">
    <div class="col-xl-12">
        @admin
                <iframe title="rapport" width="1500" height="700" src="https://app.powerbi.com/reportEmbed?reportId=7f1daa42-2dc2-4361-8112-81ad32a0a0c4&autoAuth=true&embeddedDemo=true" frameborder="0" allowFullScreen="true"></iframe>
        @endadmin
      <div class="row">
        <div class="col-md-4">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">Total Airline</p>
                  <h4 class="mb-0">{{ $data['totalAirline'] }}</h4>
                </div>

                <div class="align-self-center flex-shrink-0">
                  <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                    <span class="avatar-title">
                      <i class='bx bx-globe font-size-24'></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">Total Plane</p>
                  <h4 class="mb-0">{{ $data['totalPlane'] }}</h4>
                </div>

                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bxs-paper-plane font-size-24"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <div class="flex-grow-1">
                    <p class="text-muted fw-medium">Total Airport</p>
                    <h4 class="mb-0">{{ $data['totalAirport'] }}</h4>
                  </div>
                </div>

                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bx-buildings font-size-24"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->
    </div>
  </div>
  <!-- end row -->

  <div class="row">
    <div class="col-xl-12">
      <div class="row">
        <div class="col-md-3">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">Total Flight</p>
                  <h4 class="mb-0">{{ $data['totalFlight'] }}</h4>
                </div>

                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bxs-plane-alt font-size-24"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">Total Customer</p>
                  <h4 class="mb-0">{{ $data['totalCustomer'] }}</h4>
                </div>

                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bx-user font-size-24"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">
            <div class="card mini-stats-wid">
              <div class="card-body bg-danger">
                <div class="d-flex">
                  <div class="flex-grow-1">
                    <p class="text-white fw-medium">TotalFlightAnnuler</p>
                    <h4 class=" text-white mb-0">{{ $data['totalFlightAnnuler'] }}</h4>
                  </div>

                  <div class="align-self-center flex-shrink-0">
                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                      <span class="avatar-title rounded-circle bg-primary">
                        <i class="bx bxs-plane-alt font-size-24"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 ">
            <div class="card mini-stats-wid">
              <div class="card-body bg-warning">
                <div class="d-flex">
                  <div class="flex-grow-1">
                    <p class="text-white fw-medium">TotalFlightRetarder</p>
                    <h4 class="text-white mb-0">{{ $data['totalFlightRetarder'] }}</h4>
                  </div>

                  <div class="align-self-center flex-shrink-0">
                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                      <span class="avatar-title rounded-circle bg-primary">
                        <i class="bx bxs-plane-alt font-size-24"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 ">
            <div class="card mini-stats-wid">
              <div class="card-body ">
                <div class="d-flex">
                  <div class="flex-grow-1">
                    <p class="text-black fw-medium ">List FlightRetarder :</p>
                    @php
                        $totalFlightRetards= DB::table('vol_retarde')->get();
                    @endphp
                    @foreach ($totalFlightRetards as $totalFlightRetard )
                    @php
                        $FlightN = App\Models\Flight::where('id', $totalFlightRetard->flight_id)->pluck('flight_number')->first();
                    @endphp
                    <p class=" mb-0">FlightN° : <span class="fw-bold">{{$FlightN}}</span></p>
                    <p class=" mb-0">DurationDelay : <span class="fw-bold">{{ $totalFlightRetard->duree_retard}}</span></p>
                    <hr>
                    @endforeach

                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 ">
            <div class="card mini-stats-wid">
              <div class="card-body ">
                <div class="d-flex">
                  <div class="flex-grow-1">
                    <p class="text-black fw-medium ">List FlightAnnuler :</p>
                    @php
                        $totalFlightAnnuls= DB::table('vol_annule')->get();
                    @endphp
                    @foreach ($totalFlightAnnuls as $totalFlightAnnul )
                    @php
                        $FlightN = App\Models\Flight::where('id', $totalFlightAnnul->flight_id)->pluck('flight_number')->first();
                    @endphp
                    <p class=" mb-0">FlightN° : <span class="fw-bold">{{$FlightN}} </span></p>
                    <p class=" mb-0">CancellationReason : <span class="fw-bold"> {{ $totalFlightAnnul->raison_annulation}}</span></p>
                    <hr>
                    @endforeach

                  </div>

                </div>
              </div>
            </div>
          </div>



      </div>

    </div>
  </div>

@endsection
