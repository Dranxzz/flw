<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DevFolio Bootstrap Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Favicons -->
    <link href="{{ asset('venta/img/favicon.png')}}" rel="icon">
    <link href="{{ asset('venta/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('venta/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('venta/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('venta/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('venta/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('venta/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('venta/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('venta/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    Theme Name: DevFolio
    Theme URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body id="page-top">

    <!--/ Nav Star /-->
    <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll" href="/">Compras</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link js-scroll active" href="/#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="/#service">Services</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link js-scroll" href="{{ route('login') }}">Ingresar</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    <!--/ Nav End /-->

   @yield('content')

<!--/ Section Contact-Footer Star /-->
<section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copyright-box">
                        <p class="copyright">&copy; Copyright <strong>DevFolio</strong>. All Rights Reserved</p>
                        <div class="credits">
                            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
            -->
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>
<!--/ Section Contact-footer End /-->

    <a href="" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('venta/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('venta/lib/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('venta/lib/popper/popper.min.js') }}"></script>
    <script src="{{ asset('venta/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('venta/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('venta/lib/counterup/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('venta/lib/counterup/jquery.counterup.js') }}"></script>
    <script src="{{ asset('venta/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('venta/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('venta/lib/typed/typed.min.js') }}"></script>
    <!-- Contact Form JavaScript File -->
    <script src="{{ asset('venta/contactform/contactform.js') }}"></script>

    <!-- Template Main Javascript File -->
    <script src="{{ asset('venta/js/main.js') }}"></script>

</body>

</html>
