@extends('layouts.master')

@section('title')
    Flight List
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-4" id="action_btns">

                        <a href="{{ route('flights.create') }}" class="btn btn-rounded btn-success waves-effect waves-light ms-2"><i class="bx bx-plus font-size-16 me-2 align-middle"></i>Add Flight</a>

                      </div>
                    <table id="datatable" class="table-hover table-bordered   table">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Flight Number</th>
                            <th>Airline/Plane</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Departure</th>
                            <th>Arrival</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($flights as $flight)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $flight->flight_number }}</td>
                                <td>{{ $flight->airline->name }}/{{ $flight->plane->code }}</td>
                                <td>{{ $flight->origin->name }}</td>
                                <td>{{ $flight->destination->name }}</td>
                                <td>{{ formatDateWithTimezone($flight->departure) }}</td>
                                <td>{{ formatDateWithTimezone($flight->arrival) }}</td>
                                <td>
                                    @if($flight->status_id=='2')
                                        <i class="bx bxs-plane-take-off text-success bx-sm"></i>
                                    @elseif($flight->status_id=='1')
                                        <i class="bx bxs-plane-land text-danger bx-sm"></i>
                                        @else
                                            <i class="bx bxs-plane-land text-primary bx-sm"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('flights.edit', $flight->id) }}" type="button"
                                           class="btn btn-sm btn-info waves-effect waves-light me-1">Edit</a>
                                        <a href="javascript:void(0)" data-id="{{ $flight->id }}"
                                           data-url="{{ route('flights.destroy', $flight->id) }}"
                                           class="btn btn-sm btn-danger delete-btn me-1">Delete</a>

                                           <button type="button" class="btn btn-warning me-1" data-bs-toggle="modal" data-bs-target="#ModalCancel">
                                            <i class='bx bxs-x-square'></i>
                                          </button>

                                          <button type="button" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#ModalDelay">
                                            <i class='bx bx-time-five'></i>
                                          </button>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- cancel flight --}}
<div class="modal fade" id="ModalCancel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cancel Flight</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="cancelFlightForm" action="{{ route('flights.canceled',['id'=> $flight->id ]) }}" method="post">
                @csrf
              <input type="hidden" id="flightId" name="flightId" value="{{ $flight->id  }}">
              <div class="mb-3">
                <label for="reason" class="form-label">Reason for Cancellation</label>
                <textarea class="form-control" id="raison_annulation" name="raison_annulation" rows="3"></textarea>
              </div>
          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>

        </div>
      </div>
    </div>
  </div>
  {{-- delay modal --}}
  <div class="modal fade" id="ModalDelay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delay Flight</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="cancelFlightForm" action="{{ route('flights.delay',['id'=> $flight->id ]) }}" method="post">
                @csrf
              <input type="hidden" id="flightId" name="flightId" value="{{ $flight->id  }}">
              <div class="mb-3">
                <label for="reason" class="form-label">TimeOfDelay</label>
                <input type="number" min="0" class="form-control" id="duree_retard" name="duree_retard" rows="3"></input>
              </div>
          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')

    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            let table = $('#datatable').DataTable({

                responsive: true,

            });
        });
    </script>
@endsection
