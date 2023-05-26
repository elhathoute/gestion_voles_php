<header id="page-topbar">
  <div class="navbar-header">
    <div class="d-flex">
      <!-- LOGO -->
      <div class="navbar-brand-box">
        <a href="{{ route('root') }}" class="logo logo-dark">
          <span class="logo-sm">
            <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="22">
          </span>
          <span class="logo-lg">
            <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="17">
          </span>
        </a>

        <a href="{{ route('root') }}" class="logo logo-light">
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
    </div>

    <div class="d-flex">

     
      @php
    $notificationData = app(\App\Http\Controllers\Auth\RegisterController::class)->notification();
    $notification = json_decode($notificationData, true);

    // var_dump($notification[0]);
  @endphp
      {{-- notification --}}
      @if(auth()->user()->is_admin==1)

      <div class="dropdown d-inline-block" style="
     position: relative;
      ">
        <button style="    margin-right: 5px;font-size: 17px;" type="button" class="btn header-item waves-effect" id="page-header-notif-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class=" bx bx-bell"></i>
        </button>
        <span style="
     position: absolute;
    top: 24px;
    right: 4px;
    background: rgb(241, 80, 6);
    border-radius: 53px;}">+5</span>
        <div class="dropdown-menu dropdown-menu-end">
          <!-- item-->
          <a class="dropdown-item" href="#"> <span key="t-profile">
            @if($notification)
            @foreach ($notification as $notif )
            <p> <strong>{{ $notif['name']}}</strong> Registred at <strong>{{ $notif['created_at'] }}</strong> </p>

            @endforeach
            @else
            <span>Not Found</span>

            @endif

        </span></a>
          <div class="dropdown-divider"></div>

        </div>
      </div>
      @endif
      {{-- end notif --}}

      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="rounded-circle header-profile-user" src="{{ getAvatar(auth()->user()) }}" alt="Header Avatar">
          <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ ucfirst(Auth::user()->name) }}</span>
          <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
          <!-- item-->
          <a class="dropdown-item" href="{{ route('profile') }}"><i class="bx bx-user font-size-16 me-1 align-middle"></i> <span key="t-profile">@lang('translation.Profile')</span></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 me-1 text-danger align-middle"></i> <span
              key="t-logout">@lang('translation.Logout')</span></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
</header>
