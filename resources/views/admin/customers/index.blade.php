@extends('layouts.master')

@section('title')
  Customers
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
          <table id="datatable" class="table-hover table-bordered nowrap w-100 table">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Created At</th>
                <th>Role</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $customer)
              <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->created_at }}</td>
                <td>

                    @if ($customer->is_admin==0)
                    Customer
                    @elseif($customer->is_admin==2)
                    AdminAirPlan
                    @endif
                </td>
                <td>
                  <div class="d-flex">
                    <a href="{{ route('customers.show', $customer->id) }}" type="button" class="btn btn-sm btn-primary waves-effect waves-light me-1">View</a>
                    <a href="{{ route('customers.delete', $customer->id) }}" onclick="return confirm('Are you sure to delete this user!')" type="button" class="btn btn-sm btn-danger waves-effect waves-light me-1">
                        <i class="bx bxs-trash"></i>
                     </a>
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

  {{-- datatable init --}}
  <script type="text/javascript">
    $(function() {
      let table = $('#datatable').DataTable({
      });

      new $.fn.dataTable.Buttons(table, {
        buttons: [{
          extend: 'colvis',
          text: "Column Visibility"
        }]
      });

      table.buttons().container().prependTo($('#action_btns'));

      $('.dataTables_length select').addClass('form-select form-select-sm');

      $('.dataTables_info, .dataTables_paginate').addClass('mt-3');
    });
  </script>
@endsection
