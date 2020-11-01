<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('style')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @toastr_css
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Medically &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{  asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{  asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{  asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{  asset('css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{  asset('css/jquery.fancybox.min.css') }}">

    <link rel="stylesheet" href="{{  asset('css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{  asset('fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{  asset('css/aos.css') }}">

    <link rel="stylesheet" href="{{  asset('css/style.css') }}">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div id="app">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
              <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
              </div>
            </div>
            <div class="site-mobile-menu-body"></div>
          </div>

    <header class="site-navbar light js-sticky-header site-navbar-target" role="banner">

        <div class="container  ">
          <div class="row align-items-center">

            <div class="col-6 col-xl-2">
              <div class="mb-0 site-logo"><a href="index.html" class="mb-0">Medically<span class="text-primary">.</span> </a></div>
            </div>

            <div class="col-12 col-md-10 d-none d-xl-block">
              <nav class="site-navigation position-relative text-right" role="navigation">

                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                  <li><a href="/" class="nav-link active">Home</a></li>
                  <li class="has-children">
                    <a href="{{ route('rdv.index') }}" class="nav-link">Services</a>
                    <ul class="dropdown">
                      <li><a href="#" class="nav-link">General Surgery</a></li>
                      <li><a href="#" class="nav-link">Opthalmology Procedures</a></li>
                      <li><a href="#" class="nav-link">Outpatient Services</a></li>
                      <li><a href="#" class="nav-link">Radiology and Mammograms</a></li>
                      <li><a href="#" class="nav-link">Respiratory</a></li>
                    </ul>
                  </li>
                  <li><a href="departments.html" class="nav-link">Departments</a></li>
                  <li><a href="about.html" class="nav-link">About Us</a></li>

                  <li><a href="blog.html" class="nav-link">Blog</a></li>
                  <li><a href="contact.html" class="nav-link">Contact</a></li>

                  @if (Auth::check())
                  <li class="has-children">
                    <a href="services.html" class="nav-link">{{ auth()->user()->name }}</a>
                    <ul class="dropdown">
                        @if (auth()->user()->role == 'doctor')
                        <li><a href="{{ route('prodil.index') }}" class="nav-link">Profile</a></li>
                        @endif
                      <li><a href="#" class="nav-link">Notification</a></li>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                    </ul>
                  </li>
                  @else
                    <li><a href="{{  route('login') }}" class="btn btn-primary">Connexion</a></li>
                  <li><a href="{{ route('register') }}" class="btn btn-primary">Inscription</a></li>
                  @endif
                </ul>
              </nav>
            </div>


            <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3 text-black"></span></a></div>

          </div>
        </div>

      </header>


        <main>
            @yield('content')
        </main>
    </div>

    <footer class="site-footer bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h2 class="footer-heading mb-4">Departments</h2>
                    <ul class="list-unstyled">
                        <li><a href="#">X-Ray</a></li>
                        <li><a href="#">Children Care</a></li>
                        <li><a href="#">Eye Treatment</a></li>
                <li><a href="#">Nose Treatment</a></li>
                <li><a href="#">Surgery</a></li>
              </ul>
            </div>
            <div class="col-lg-3">
              <h2 class="footer-heading mb-4">Our Services</h2>
              <ul class="list-unstyled">
                <li><a href="#">X-Ray</a></li>
                <li><a href="#">Children Care</a></li>
                <li><a href="#">Eye Treatment</a></li>
                <li><a href="#">Nose Treatment</a></li>
                <li><a href="#">Surgery</a></li>
              </ul>
            </div>
            <div class="col-lg-3">
              <h2 class="footer-heading mb-4">Navigation</h2>
              <ul class="list-unstyled">
                <li><a href="#">Home</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Customer Care</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Terms</a></li>
              </ul>
            </div>
            <div class="col-lg-3">
              <h2 class="footer-heading mb-4">Social</h2>
              <div class="social mb-5">
                <a href="#" class=""><span class="icon-facebook"></span></a>
                <a href="#" class=""><span class="icon-twitter"></span></a>
                <a href="#" class=""><span class="icon-linkedin"></span></a>
                <a href="#" class=""><span class="icon-instagram"></span></a>
              </div>


              <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
              <form action="#" method="post" id="footer-subscribe" class="footer-subscribe">
                <div class="input-group mb-3">
                  <input type="text" class="form-control  bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-white text-black" type="button" id="button-addon2">Send</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
              <div class="border-top pt-5">
                <p class="copyright"><small>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small></p>

                </div>
              </div>

            </div>
          </div>
        </footer>

      </div> <!-- .site-wrap -->

      @yield('js')

      @jquery

      @toastr_js

      @toastr_render
    <script src="{{  asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{  asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{  asset('js/bootstrap.min.js') }}"></script>
    <script src="{{  asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{  asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{  asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{  asset('js/aos.js') }}"></script>
    <script src="{{  asset('js/jquery.fancybox.min.js') }}"></script>
    <script src="{{  asset('js/jquery.sticky.js') }}"></script>
    <script src="{{  asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="{{ asset('js/main.js') }}"></script>


</body>
</html>
