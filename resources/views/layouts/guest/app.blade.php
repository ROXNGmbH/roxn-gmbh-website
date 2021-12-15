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
</head>
<body>
    @yield('main-content')

    <script src="{{asset('assets/admin//js/vendors/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/admin//js/vendors/bootstrap.bundle.min.js')}}"></script>
</body>
