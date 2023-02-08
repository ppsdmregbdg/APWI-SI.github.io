<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PPSDM Regional Bandung</title>

  <!-- Favicons -->
  <link href="/assets/img/apwi-logo.png" rel="icon">
  <link href="/assets/img/apwi-logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eBusiness - v4.9.1
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  @include('sweetalert::alert')
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1><a href="/"><span>AP</span>WI</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li>
            @if(Request::is('articles') || Request::is('elearnings') || Request::is('videos'))
              <a class="nav-link scrollto" href="/#hero">Home</a>
            @else
              <a class="nav-link scrollto" href="#hero">Home</a>
            @endif
          </li>
          <li>
            @if(Request::is('articles') || Request::is('elearnings') || Request::is('videos'))
              <a class="nav-link scrollto" href="/#about">About</a>
            @else
              <a class="nav-link scrollto" href="#about">About</a>
            @endif
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">E-Publikasi <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Jurnal</a></li>
                <li><a href="#">Buku</a></li>
                <li><a href="/articles">Newspaper</a></li>
              </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">E-Learning <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/elearnings">Modul</a></li>
                <li><a href="/videos">Video</a></li>
              </ul>
          </li>
          @auth
            <li class="dropdown"><a href="#"><span>Welcome, {{ auth()->user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="/dashboard">
                  <button style="
                  background-color: transparent;
                  background-repeat: no-repeat;
                  border: none;
                  "
                  >Dashboard</button>
                </a></li>
                <li>
                  <a>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" style="
                    background-color: transparent;
                    background-repeat: no-repeat;
                    border: none;
                    "
                    >Logout</button>
                  </form>
                  </a>
                </li>
              </ul>
            </li>
          @else
            {{-- <li><a class="nav-link" href="/login">Login</a></li> --}}
          @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer>
    
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>PPSDM</strong> Regional Bandung
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>