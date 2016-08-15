<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    BOOTSTRAP CDN-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/homepage/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/homepage/sidebar-left.css')}}">

    @yield('styles')

    <!-- jQuery library -->
    <script src="{{asset('/js/jquery-2.2.4.min.js')}}"></script>

    <!-- Latest compiled JavaScript -->
    <script src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>


    @yield('scripts')
</head>
<body>
@include('homepage.layouts.header')
<div class="body">
    @yield('content')
    <div class="goto-top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </div>
    <script>
        $('.goto-top').click(function () {
            $('.body').animate({scrollTop: 0});
        });
    </script>
    @include('homepage.layouts.footer')
</div>
</body>
</html>