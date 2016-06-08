<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    @yield('styles')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    BOOTSTRAP CDN-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">

    <!-- jQuery library -->
    <script src="{{asset('/js/jquery-2.2.4.min.js')}}"></script>

    <!-- Latest compiled JavaScript -->
    <script src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>
    @yield('scripts')
</head>
<body>
@include('layouts_kenh15.header_kenh15')
<div class="container">
    @yield('content')
</div>
</body>
</html>