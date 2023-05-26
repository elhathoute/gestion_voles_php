@extends('layouts.master')

@section('title')
  Airports
@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-end mb-4" id="action_btns">

            <a href="{{ route('airports.create') }}" class="btn btn-rounded btn-success waves-effect waves-light ms-2"><i class="bx bx-plus font-size-16 me-2 align-middle"></i>Add Airport</a>

          </div>
          <table id="datatable" class="table-hover table-bordered nowrap w-100 table">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>City</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($airports as $airport)
                <tr>
                  <td>{{ $airport->id }}</td>
                  <td>{{ $airport->name}}</td>
                  <td>{{ $airport->city->name }}</td>
                  <td>{{ formatDate($airport->created_at) }}</td>
                  <td>
                    <div class="d-flex">
                      <a href="{{ route('airports.edit', $airport->id) }}" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">Edit</a>
                      <a href="javascript:void(0)" data-id="{{ $airport->id }}" data-url="{{ route('airports.destroy', $airport->id) }}" class="btn btn-sm btn-danger delete-btn">Delete</a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div> <!-- end col -->
  </div> <!-- end row -->
@endsection

@section('script')
  <!-- Required datatable js -->
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
