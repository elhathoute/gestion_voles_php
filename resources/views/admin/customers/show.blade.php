@extends('layouts.master')

@section('title')
  @lang('translation.resource_info', ['resource' => __('attributes.customer')])
@endsection

@section('css')
  <!-- Lightbox css -->
  <link href="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')


  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row">

            <div class="col-xl-6">
              <div class="mt-5">
                <div class="table-responsive">
                  <table class="table-borderless mb-0 table">
                    <tbody>
                      <tr>
                        <th scope="row" style="width: 400px;">Name</th>
                        <td>{{ $user->name }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">Email</th>
                        <td>{{ $user->email }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">Phone</th>
                        <td>{{ $user->phone }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">Address</th>
                        <td>{{ $user->address }}</td>
                      </tr>


                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- end row -->

        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
  <!-- end row -->

@endsection
@section('script')
  <!-- Magnific Popup-->
  <script src="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>
  <!-- Required datatable js -->
  <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>



@endsection
