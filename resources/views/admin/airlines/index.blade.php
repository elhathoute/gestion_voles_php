@extends('layouts.master')

@section('title')
  Airline
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

            <a href="{{ route('airlines.create') }}" class="btn btn-rounded btn-success waves-effect waves-light ms-2"><i class="bx bx-plus font-size-16 me-2 align-middle"></i>Add Airline</a>

          </div>
          <table id="datatable" class="table-hover table-bordered nowrap w-100 table">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Code</th>
                <th>Number of Planes</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($airlines as $airline)
                <tr>
                  <td>{{ $airline->id }}</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="{{ getFile($airline) }}" class="img-thumbnail avatar-md">
                      <span class="ms-2">{{ $airline->name }}</span>
                    </div>
                  </td>
                  <td>{{ $airline->code }}</td>
                  <td><span class="badge badge-pill badge-soft-info font-size-14">{{ $airline->planes_count }}</span></td>
                  <td>{{ $airline->created_at }}</td>
                  <td>
                    <div class="d-flex">
                      <a href="{{ route('airlines.show', $airline->id) }}" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">View</a>
                      <a href="{{ route('airlines.edit', $airline->id) }}" type="button" class="btn btn-sm btn-info waves-effect waves-light me-1">Edit</a>
                      <a href="javascript:void(0)" data-id="{{ $airline->id }}" data-url="{{ route('airlines.destroy', $airline->id) }}" class="btn btn-sm btn-danger delete-btn">Delete</a>
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
