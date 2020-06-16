<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'DINKOMINFO Banyumas') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{asset('bootstrap/portal/img/favicon.png')}}" rel="icon">
    <link href="{{asset('bootstrap/portal/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700|Roboto:300,400,700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{asset('bootstrap/portal/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('bootstrap/portal/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/portal/vendor/line-awesome/css/line-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/portal/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/portal/vendor/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('bootstrap/portal/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('bootstrap/portal/css/navtab.css')}}">


    {{-- sumber dari layout.app --}}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- END sumber dari layout.app --}}

    <!-- =======================================================
    Template Name: SoftLand
    Template URL: https://bootstrapmade.com/softland-bootstrap-app-landing-page-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com/
  ======================================================= -->
</head>

<body>

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icofont-close js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        {{-- navbar header --}}
        @include('partials.header')
        {{-- navbar header --}}


        <main id="main">
            @yield('content')
        </main>

        {{-- footer --}}
        @include('partials.footer')
        {{-- footer --}}
    </div>
    <!-- .site-wrap -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('bootstrap/portal/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/portal/vendor/jquery/jquery-migrate.min.js')}}"></script>
    <script src="{{asset('bootstrap/portal/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bootstrap/portal/vendor/easing/easing.min.js')}}"></script>
    <script src="{{asset('bootstrap/portal/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('bootstrap/portal/vendor/sticky/sticky.js')}}"></script>
    <script src="{{asset('bootstrap/portal/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('bootstrap/portal/vendor/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('bootstrap/portal/js/main.js')}}"></script>

</body>

</html>