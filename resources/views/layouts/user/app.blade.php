<!DOCTYPE html>
    @if(app()->getLocale() == 'ar')
    <html lang="ar" dir="rtl" class="rtl" class="no-js">
    @else
    <html lang="en" dir="ltr"  class="no-js" >
    @endif
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge"/>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta property="og:title" content=""/>
        <meta property="og:type" content=""/>
        <meta property="og:url" content=""/>
        <meta property="og:image" content=""/>
        <title>@yield('page-title')</title>
    @yield('page-seo')
    @yield('styles')
    <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/user/imgs/theme/favicon.svg')}}"/>

        <!-- Template CSS -->

        @if(app()->getLocale() == 'ar')
            <link rel="stylesheet" href="{{asset('assets/user/rtl/css/plugins/animate.min.css')}}"/>
            <link rel="stylesheet" href="{{asset('assets/user/rtl/css/main.css?v=4.0')}}"/>
        @else
            <link rel="stylesheet" href="{{asset('assets/user/ltr/css/plugins/animate.min.css')}}"/>
            <link rel="stylesheet" href="{{asset('assets/user/ltr/css/main.css?v=4.0')}}"/>
        @endif

    </head>
    <body>
    <!-- Headers Content -->
    @include('layouts.user.headers.desktop')
    @include('layouts.user.headers.mobile')
    <!-- Main Content -->
    @yield('main-content')
    <!-- Preloader Start -->
    @include('layouts.user.preloader')
    <!-- Footer Content -->
    @include('layouts.user.footer')

    <!-- Vendor JS-->
    <script src="{{asset('assets/user/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/user/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/user/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('assets/user/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/user/js/plugins/slick.js')}}"></script>
    <script src="{{asset('assets/user/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('assets/user/js/plugins/waypoints.js')}}"></script>
    <script src="{{asset('assets/user/js/plugins/wow.js')}}"></script>
    <script src="{{asset('assets/user/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/user/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/user/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('assets/user/js/plugins/counterup.js')}}"></script>
    <script src="{{asset('assets/user/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/user/js/plugins/images-loaded.js')}}"></script>
    <script src="{{asset('assets/user/js/plugins/isotope.js')}}"></script>
    <script src="{{asset('assets/user/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('assets/user/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{asset('assets/user/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{asset('assets/user/js/plugins/jquery.elevatezoom.js')}}"></script>
    <!-- Template  JS -->
    <script src="{{asset('assets/user/js/main.js?v=4.0')}}"></script>
    <script src="{{asset('assets/user/js/shop.js?v=4.0')}}"></script>


    @yield('scripts')
    </body>
