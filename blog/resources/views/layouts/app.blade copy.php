<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>


  <!-- <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->


  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/client/img/favicon.png') }}">
  <!-- Normalize CSS -->
  <link rel="stylesheet" href="{{ asset('asset/client/css/normalize.css') }}">
  <!-- Main CSS -->
  <link rel="stylesheet" href="{{ asset('asset/client/css/main.css') }}">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('asset/client/css/bootstrap.min.css') }}">
  <!-- Animate CSS -->
  <link rel="stylesheet" href="{{ asset('asset/client/css/animate.min.css') }}">
  <!-- Font-awesome CSS-->
  <link rel="stylesheet" href="{{ asset('asset/client/css/font-awesome.min.css') }}">
  <!-- Owl Caousel CSS -->
  <link rel="stylesheet" href="{{ asset('asset/client/vendor/OwlCarousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/client/vendor/OwlCarousel/owl.theme.default.min.css') }}">
  <!-- Main Menu CSS -->
  <link rel="stylesheet" href="{{ asset('asset/client/css/meanmenu.min.css') }}">
  <!-- Magnific CSS -->
  <link rel="stylesheet" type="text/css') }}" href="{{ asset('asset/client/css/magnific-popup.css') }}">
  <!-- Switch Style CSS -->
  <link rel="stylesheet" href="{{ asset('asset/client/css/hover-min.css') }}">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('asset/client/style.css') }}">
  <!-- For IE -->
  <link rel="stylesheet" type="text/css') }}" href="{{ asset('asset/client/css/ie-only.css') }}" />
  <!-- Modernizr Js -->
  <script src="{{ asset('asset/client/js/modernizr-2.8.3.min.js') }}"></script>
</head>
<body>
  <div id="preloader"></div>
  <!-- Preloader End Here -->
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler') }}" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <main class="py-4">
      @yield('content')
    </main>
  </div>
  <script src="{{ asset('asset/client/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
  <!-- Plugins js -->
  <script src="{{ asset('asset/client/js/plugins.js') }}" type="text/javascript"></script>
  <!-- Popper js -->
  <script src="{{ asset('asset/client/js/popper.js') }}" type="text/javascript"></script>
  <!-- Bootstrap js -->
  <script src="{{ asset('asset/client/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <!-- WOW JS -->
  <script src="{{ asset('asset/client/js/wow.min.js') }}"></script>
  <!-- Owl Cauosel JS -->
  <script src="{{ asset('asset/client/vendor/OwlCarousel/owl.carousel.min.js') }}" type="text/javascript"></script>
  <!-- Meanmenu Js -->
  <script src="{{ asset('asset/client/js/jquery.meanmenu.min.js') }}" type="text/javascript"></script>
  <!-- Srollup js -->
  <script src="{{ asset('asset/client/js/jquery.scrollUp.min.js') }}" type="text/javascript"></script>
  <!-- jquery.counterup js -->
  <script src="{{ asset('asset/client/js/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('asset/client/js/waypoints.min.js') }}"></script>
  <!-- Isotope js -->
  <script src="{{ asset('asset/client/js/isotope.pkgd.min.js') }}" type="text/javascript"></script>
  <!-- Magnific Popup -->
  <script src="{{ asset('asset/client/js/jquery.magnific-popup.min.js') }}"></script>
  <!-- Ticker Js -->
  <script src="{{ asset('asset/client/js/ticker.js') }}" type="text/javascript"></script>
  <!-- Custom Js -->
  <script src="{{ asset('asset/client/js/main.js') }}" type="text/javascript"></script>
</body>
</html>