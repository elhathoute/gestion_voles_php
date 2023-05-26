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
                    <table id="datatable" class="table-hover table-bordered nowrap w-100 table">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Flight Number</th>
                            <th>Airline</th>
                            <th>Plane Code</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Departure</th>
                            <th>Arrival</th>
                            <th>Seats</th>
                            <th>Remaining Seats</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($flights as $flight)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $flight->flight_number }}</td>
                                <td>{{ $flight->airline->name }}</td>
                                <td>{{ $flight->plane->code }}</td>
                                <td>{{ $flight->origin->name }}</td>
                                <td>{{ $flight->destination->name }}</td>
                                <td>{{ formatDateWithTimezone($flight->departure) }}</td>
                                <td>{{ formatDateWithTimezone($flight->arrival) }}</td>
                                <td>{{ $flight->seats }}</td>
                                <td>{{ $flight->remain_seats }}</td>
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
                                           class="btn btn-sm btn-danger delete-btn">Delete</a>
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
@endsection

@section('script')

    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            let table = $('#datatable').DataTable({
                lengthMenu: [10, 25, 50, 100],
                pageLength: 10,
                responsive: true,

            });
        });
    </script>
@endsection
