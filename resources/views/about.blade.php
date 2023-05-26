
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('frontend/style.css') }}" />
  <title>{{ config('app.name') }}</title>
</head>

<body>
 <nav style="background-color: #56b9ff!important" class="px-5">
      <svg width="44" height="18" viewBox="0 0 44 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <line class="line" y1="1" x2="44" y2="1" stroke="white" stroke-width="2" />
          <line class="line" y1="9" x2="27" y2="9" stroke="white" stroke-width="2" />
          <line class="line" y1="17" x2="11" y2="17" stroke="white" stroke-width="2" />
        </svg>
        <div class="logo">
          <img src="{{ asset('frontend/assets/logo.png') }}" alt="mind & body" style="width: 7rem" />
          {{-- <h1>SULAYMANIYAH INTERNATIONAL AIRPORT</h1> --}}
        </div>
        <div class="links">
          @auth
            @if (Auth::user()->is_admin)
              <a href="{{ route('root') }}">Dashbaord</a>
            @else
              <a href="{{ route('customer.flights') }}">Dashbaord</a>
            @endif
            <a href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 me-1 text-danger align-middle"></i> @lang('translation.Logout')</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            <a href="/about">About</a>
          <a href="{{route('customer.rapports')}}">Rapport</a>
          @else
          <a href="/about">About</a>
          <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}">Register</a>
            @endif
          @endauth
        </div>


      </nav>
<section class="about">
      <div class="our-story">
        <h2>About Us</h2>
        <p>
          Always a student, Janet has immersed herself in the ancient practices
          of yoga for over thirty years. A global yoga teacher, she shares the
          teachings from the heart. Through curiosity, devotion, and dedication
          she creates a unique approach to living yoga.
        </p>
      </div>
      <img src="{{ asset('frontend/assets/our-story.jpg') }}" alt="our-story" />
</section>





  <footer>
    <div>
      <p>©
        <script>
          document.write(new Date().getFullYear())
        </script> {{ config('app.name') }}. Crafted with ❤️
      </p>
    </div>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/ScrollTrigger.min.js"></script>
  <script src="{{ asset('frontend/script.js') }}"></script>
</body>

</html>
