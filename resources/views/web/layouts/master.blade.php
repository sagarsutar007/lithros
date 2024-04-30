<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="@yield('meta_description', '')">
  <link href="{{ asset('assets/images/favicon/favicon.png') }}" rel="icon">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:400,500,600,700%7cRoboto:400,500,700&amp;display=swap">
  <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.15.3/css/all.css">
  <link rel="stylesheet" href="{{ asset('assets/css/libraries.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
  <div class="wrapper">
    <div class="preloader">
      <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div>

    <!-- =========================
        Header
    =========================== -->
    <header class="header header-layout3">
      <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('main') }}">
            <img src="{{ asset('assets/images/logo/logo.png') }}" class="logo" alt="logo">
          </a>
          <button class="navbar-toggler" type="button">
            <span class="menu-lines"><span></span></span>
          </button>
          <div class="header__top-right d-none d-xl-block">
            <div class="d-flex align-items-center">
              <ul class="contact__list d-flex flex-wrap align-items-center list-unstyled mb-0">
                <li>
                  <i class="icon-phone color-heading"></i>
                  <a href="tel:8260617350" class="color-body"> Phone: +91 82606 17350</a>
                </li>
                <li>
                  <i class="icon-mail color-heading"></i>
                  <a href="mailto:lithrosindia@gmail.com" class="color-body"> Email: lithrosindia@gmail.com</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="mainNavigation">
            <ul class="navbar-nav ml-auto">
              <li class="nav__item">
                <a href="{{ route('main') }}" class="nav__item-link active">Home</a>
              </li>
              <li class="nav__item has-dropdown">
                <a href="#" class="nav__item-link">About Us</a>
                <button class="dropdown-toggle" data-toggle="dropdown"></button>
                <ul class="dropdown-menu">
                  <li class="nav__item">
                    <a href="{{ route('web.company') }}" class="nav__item-link">Company</a>
                  </li>
                  <li class="nav__item">
                    <a href="#" class="nav__item-link">Legals</a>
                  </li>
                  <li class="nav__item">
                    <a href="#" class="nav__item-link">CSR</a>
                  </li>
                  <li class="nav__item">
                    <a href="{{ route('web.gallery') }}" class="nav__item-link">Gallery</a>
                  </li>
                </ul>
              </li>
              <li class="nav__item has-dropdown">
                <a href="#" class="nav__item-link">Services</a>
                <button class="dropdown-toggle" data-toggle="dropdown"></button>
                <ul class="dropdown-menu">
                  <li class="nav__item">
                    <a href="#" class="nav__item-link">Recharging</a>
                  </li>
                  <li class="nav__item">
                    <a href="#" class="nav__item-link">Recycling</a>
                  </li>
                </ul>
              </li>
              <li class="nav__item">
                <a href="{{ route('web.products') }}" class="nav__item-link">Products</a>
              </li>
              <li class="nav__item has-dropdown">
                <a href="{{ route('web.careers') }}" class="nav__item-link">Careers</a>
              </li>
              <li class="nav__item">
                <a href="{{ route('web.contact') }}" class="nav__item-link">Contact Us</a>
              </li>
            </ul>
            <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
          </div>
          <ul class="navbar-actions d-none d-xl-flex align-items-center list-unstyled mb-0">
            <li>
              <a href="{{ route('web.contact') }}" class="btn btn__primary">
                <span>Request A Quote</span>
                <i class="icon-arrow-right"></i>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    @yield('content')

    <!-- ========================
      Footer
    ========================== -->
    <footer class="footer">
      <div class="footer-primary">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 footer-widget footer-widget-contact">
              <img src="{{ asset('assets/images/logo/logo-white.png') }}" class="logo" alt="logo">
              <div class="footer-widget-content">
                <p class="mb-20">If you have any questions or need help, feel free to contact with our team.</p>
                <div class="contact__number d-flex align-items-center mb-30">
                  <i class="icon-phone"></i>
                  <a href="tel:8260617350" class="color-primary">+91 82606 17350</a>
                </div><!-- /.contact__numbr -->
                <p class="mb-20">D2/5, Mancheswar Industrial Estate, Bhubaneswar -751017, Odisha, India</p>
                <a href="#" class="btn__location">
                  <i class="icon-location"></i>
                  <span>Get Directions</span>
                </a>
              </div><!-- /.footer-widget-content -->
            </div><!-- /.col-xl-3 -->
            <div class="col-6 col-sm-6 col-md-6 col-lg-2 col-xl-2 footer-widget footer-widget-nav">
              <h6 class="footer-widget-title">Company</h6>
              <div class="footer-widget-content">
                <nav>
                  <ul class="list-unstyled">
                    <li><a href="{{ route('web.company') }}">About Us</a></li>
                    <li><a href=#>Legals</a></li>
                    <li><a href="#">CSR</a></li>
                    <li><a href="{{ route('web.gallery') }}">Gallery</a></li>
                    <li><a href="{{ route('web.careers') }}">Careers</a></li>
                    <li><a href="{{ route('web.products') }}">Products</a></li>
                  </ul>
                </nav>
              </div><!-- /.footer-widget-content -->
            </div><!-- /.col-xl-2 -->
            <div class="col-6 col-sm-6 col-md-6 col-lg-2 col-xl-2 footer-widget footer-widget-nav">
              <h6 class="footer-widget-title">Services</h6>
              <div class="footer-widget-content">
                <nav>
                  <ul class="list-unstyled">
                    <li><a href="#">Recharging</a></li>
                    <li><a href="#">Recycling</a></li>
                  </ul>
                </nav>
              </div><!-- /.footer-widget-content -->
            </div><!-- /.col-xl-2 -->
            <div class="col-6 col-sm-6 col-md-6 col-lg-2 col-xl-2 footer-widget footer-widget-nav">
              <h6 class="footer-widget-title">Support</h6>
              <div class="footer-widget-content">
                <nav>
                  <ul class="list-unstyled">
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Shipping Policy</a></li>
                    <li><a href="#">Delivery Policy</a></li>
                    <li><a href="#">Return Policy</a></li>
                    <li><a href="#">FAQ</a></li>
                  </ul>
                </nav>
              </div><!-- /.footer-widget-content -->
            </div><!-- /.col-xl-2 -->
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 footer-widget footer-widget-align-right">
              <h6 class="footer-widget-title">Products Catalogue</h6>
              <div class="footer-widget-content">
                <a href="request-quote.html" class="btn btn__primary btn__primary-style2 btn__download mb-60">
                  <i class="icon-download"></i>
                  <span>Download PDF</span>
                </a>
                <ul class="social-icons list-unstyled">
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                </ul><!-- /.social-icons -->
              </div><!-- /.footer-widget-content -->
            </div><!-- /.col-xl-3 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.footer-primary -->
      <div class="footer-copyrights">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between">
              <nav>
                <ul class="copyright__nav d-flex flex-wrap list-unstyled mb-0">
                  <li><a href="#">Terms & Conditions</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Sitemap</a></li>
                </ul>
              </nav>
              <p class="mb-0">
                <span class="color-gray">&copy; {{ date("Y") }} Lithros India, All Rights Reserved. Developed by</span>
                <a href="https://www.infutech.in/">INFUTECH</a>
              </p>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.footer-copyrights-->
    </footer><!-- /.Footer -->
    <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>
  </div><!-- /.wrapper -->

  <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
