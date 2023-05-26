<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

  <div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <!-- Left Menu Start -->
      <ul class="metismenu list-unstyled" id="side-menu">

        @if (auth()->user()->is_admin==1)
          <li>
            <a href="{{ route('root') }}" class="waves-effect">
              <i class="bx bx-home-circle"></i>
              <span key="t-contact">@lang('sidebar.dashboard')</span>
            </a>
          </li>

          <li class="{{ request()->routeIs('airlines.*') ? 'mm-active' : '' }}">
            <a href="{{ route('airlines.index') }}" class="waves-effect">
              <i class='bx bx-globe'></i>
              <span key="t-contact">@lang('sidebar.airlines')</span>
            </a>
          </li>

          <li class="{{ request()->routeIs('planes.*') ? 'mm-active' : '' }}">
            <a href="{{ route('planes.index') }}" class="waves-effect">
              <i class='bx bxs-paper-plane'></i>
              <span key="t-contact">@lang('sidebar.planes')</span>
            </a>
          </li>

          <li class="{{ request()->routeIs('airports.*') ? 'mm-active' : '' }}">
            <a href="{{ route('airports.index') }}" class="waves-effect">
              <i class='bx bx-buildings'></i>
              <span key="t-contact">@lang('sidebar.airports')</span>
            </a>
          </li>

          <li class="{{ request()->routeIs('flights.*') ? 'mm-active' : '' }}">
            <a href="{{ route('flights.index') }}" class="waves-effect">
              <i class='bx bxs-plane-alt'></i>
              <span key="t-contact">@lang('sidebar.flights')</span>
            </a>
          </li>



          <li class="{{ request()->routeIs('customers.*') ? 'mm-active' : '' }}">
            <a href="{{ route('customers.index') }}" class="waves-effect">
              <i class='bx bx-user'></i>
              <span key="t-contact">Customers</span>
            </a>
          </li>

        @elseif (auth()->user()->is_admin==2 || auth()->user()->is_admin==0)
          {{-- USER ROUTES  --}}

          <li>
            <a href="{{ route('profile') }}" class="waves-effect">
              <i class="bx bx-user-circle"></i>
              <span key="t-contact">@lang('sidebar.my_profile')</span>
            </a>
          </li>
        @if(auth()->user()->is_admin==0)
        <li>
            <a href="{{ route('customer.flights') }}" class="waves-effect">
              <i class="bx bxs-plane-take-off"></i>
              <span key="t-contact">@lang('sidebar.flights')</span>
            </a>
          </li>
          <li>
            <a href="{{ route('customer.rapports') }}" class="waves-effect">
              <i class="bx bxs-plane-take-off"></i>
              <span key="t-contact">rapports</span>
            </a>
          </li>
          @endif

          @if(auth()->user()->is_admin==2)
          <li>
            <a href="{{ route('root') }}" class="waves-effect">
              <i class="bx bx-home-circle"></i>
              <span key="t-contact">@lang('sidebar.dashboard')</span>
            </a>
          </li>


          @endif


        @endif

      </ul>
    </div>
    <!-- Sidebar -->
  </div>
</div>
<!-- Left Sidebar End -->

@push('scripts')
  <script>
    $(document).ready(function() {
      getOrderStatusCount()
    });



  </script>
@endpush
