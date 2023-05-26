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
  <div class="conatiner">
    <section class="front-page">
      <img class="hero" src="{{ asset('frontend/assets/hero.png') }}" alt="meditation" autoplay />
      <video muted autoplay loop class="hero" src="{{ asset('frontend/assets/video.mp4') }}"></video>
      <nav class="">
        <div class="logo ">
          <img src="{{ asset('frontend/assets/logo.png') }}" alt="mind & body" style="width: 15rem" />

        </div>



      </nav>
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
              <button class="cta-sec">
                <a href="{{ route('login') }}">Sign in</a>
              </button>
            @endauth
          </div>
        </div>
      </div>
    </section>


    <section class="classes">
      <div class="classes-description">
        <h2>Placees waiting for you</h2>
        <h3>It's time to heal your mind and body</h3>
      </div>

    </section>
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




  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/ScrollTrigger.min.js"></script>
  <script src="{{ asset('frontend/script.js') }}"></script>
</body>

</html>
