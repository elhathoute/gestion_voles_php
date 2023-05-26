@extends('layouts.master')

@section('title')
  @lang('translation.resource_info', ['resource' => __('attributes.airline')])
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
                        <td>{{ $airline->name }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">Code</th>
                        <td>{{ $airline->code }}</td>
                      </tr>
                      <tr>
                        <th scope="row" style="width: 400px;">N°Planes</th>
                        <td>
                          <span class="badge badge-pill badge-soft-info font-size-14">{{ $airline->planes()->count() }}</span>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- end Specifications -->
            <div class="col-xl-6">
              <a class="airlineImageLightBox" href="{{ getFile($airline) }}">
                <img alt="car expense image" src="{{ getFile($airline) }}" class="img-thumbnai img-fluid d-block w-50 mx-auto">
              </a>
            </div>

          </div>
          <!-- end row -->

        </div>
      </div>
      <!-- end card -->
    </div>
  </div>

@endsection
@section('script')
  <!-- Magnific Popup-->
  <script src="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.js') }}"></script>
  <!-- Required datatable js -->
  <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
@endsection
