<header id="page-topbar">
    <div class="navbar-header">
      <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box">
          <a href="#" class="logo logo-dark">
            <span class="logo-sm">
              <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
              <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
          </a>

          <a href="#" class="logo logo-light">
            <span class="logo-sm">
              <img src="{{ URL::asset('/assets/images/air-plane-icon.jpg') }}" alt=""  class="rounded-circle" height="30">
            </span>
            <span class="logo-lg">
              <img src="{{ URL::asset('/assets/images/air-plane-icon.jpg') }}" alt="" class="rounded-circle mt-3" height="60">
            </span>
          </a>
        </div>

        <button type="button" class="btn btn-sm font-size-16 header-item waves-effect px-3" id="vertical-menu-btn">
          <i class="fa fa-fw fa-bars"></i>
        </button>

        <img src="" alt="">
      </div>

      <div class="d-flex">


        {{-- end notif --}}

        <div class="dropdown d-inline-block">

            <div class="logo">
                <img style="    max-height: 83px;
                max-width: 100px;" src="{{ asset('frontend/assets/logo.png') }}" alt="mind & body" style="width: 15rem" />

              </div>

        </div>
      </div>
    </div>
  </header>
