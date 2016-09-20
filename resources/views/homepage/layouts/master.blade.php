<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    BOOTSTRAP CDN-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{asset('public/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/homepage/app.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/homepage/sidebar-left.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/homepage/footer.css')}}">

@yield('styles')

<!-- jQuery library -->
    <script src="{{asset('public/jquery/jquery-2.2.4.min.js')}}"></script>

    <!-- Latest compiled JavaScript -->
    <script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>


    @yield('scripts')
</head>
<body>
@include('homepage.layouts.header')
<div class="body">
    @yield('content')
    <div class="goto-top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </div>
    @include('homepage.layouts.footer')
    <script>
        $('.goto-top').click(function () {
            $('.body').animate({scrollTop: 0});
        });
    </script>
    @yield('body.scripts')
</div>
</body>
</html>