<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ App::getLocale() == 'en' ? 'ltr' : 'rtl' }}">

<head>
  <meta charset="utf-8" />
  <title>@yield('title') | {{ config('app.name') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />
  <meta name="_token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('frontend/style.css') }}" />

  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
  @include('layouts.head-css')
</head>

@section('body')

  <body data-sidebar="dark" class="sidebar-enable vertical-collpsed">
  @show
  <!-- Begin page -->
  <div id="layout-wrapper">
    @include('layouts.topbar_index')
    @include('layouts.sidebar_index')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
      <div class="page-content">
        <div class="container-fluid">
            <div class="primary-overlay">
                <div class="selling-point">
                  <h2>Let your mind breathe.</h2>
                  <h3>
                    The world is a book and those who do not travel read only one page.
                  </h3>
                  <div class="ctas">
                    @auth
                      <button class="cta-main">
                        @if (Auth::user()->is_admin)
                          <a href="{{ route('root') }}">Dashboard</a>
                        @else
                          <a href="{{ route('customer.flights') }}">Search A Flight</a>
                        @endif
                      </button>
                    @else
                      <button class="cta-main">
                          <a href="{{ route('customer.flights') }}">Search A Flight</a>
                      </button>
                      <button class="cta-sec">
                        <a href="{{ route('register') }}">Sign up</a>
                      </button>
                    @endauth
                  </div>
                </div>
              </div>
        </div>
        <!-- container-fluid -->
      </div>

    </div>
    <!-- end main content-->
  </div>



  <div class="d-none">
    <p id="maxFileMessage">@lang('messages.max_files')</p>
    <p id="noneOption">@lang('translation.none')</p>
    <p id="storeTempFile">{{ route('storeTempFile') }}</p>
    <p id="deleteTempFile">{{ route('deleteTempFile') }}</p>
  </div>



  <!-- JAVASCRIPT -->
  @include('layouts.vendor-scripts')
</body>

</html>
