<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>@yield('page-title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/admin/imgs/theme/favicon.svg')}}"/>
    <!-- Template CSS -->
    <link href="{{asset('assets/admin/css/main.css?v=1.1')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/admin/css/vendors/nice-select.css')}}" rel="stylesheet" type="text/css"/>
    @yield('page-head')
</head>
<body>
    @include('sweetalert::alert')
<!-- Page overlay component -->
    <x-admin.overlay></x-admin.overlay>

<!-- Sidebar -->
    @include('layouts.admin.side-bar')
<!-- Sidebar -->
    <main class="main-wrap">
        <!-- Header -->
        @include('layouts.admin.header')
       <!-- Main content -->
        <section class="content-main">
            <!-- Content Header -->
            <div class="content-header">
                 @yield('content-header')
            </div>
            <!-- Content -->
            @yield('main-content')
        </section>
        <!-- Footer -->
        @include('layouts.admin.footer')
    </main>
<!-- Scripts -->
    <script src="{{asset('assets/admin/js/vendors/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/vendors/select2.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/vendors/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/admin/js/vendors/jquery.fullscreen.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/vendors/chart.js')}}"></script>
    <script src="{{asset('assets/admin/js/vendors/jquery.nice-select.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <!-- Main Script -->
    <script src="{{asset('assets/admin/js/main.js?v=1.1')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/js/custom-chart.js')}}" type="text/javascript"></script>

    @yield('scripts')

</body>
