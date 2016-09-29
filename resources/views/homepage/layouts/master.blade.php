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
    <link rel="stylesheet" href="{{asset('/css/homepage/footer.css')}}">

@yield('styles')

<!-- jQuery library -->
    <script src="{{asset('/jquery/jquery-2.2.4.min.js')}}"></script>

    <!-- Latest compiled JavaScript -->
    <script src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>

    {{--Angular lib--}}
    <script src="{{asset('/angular/angular.min.js')}}"></script>
    <script src="{{asset('/angular/angular-utils-pagination/dirPagination.js')}}"></script>
    {{--End angular--}}


    @yield('scripts')
</head>
<body ng-app="mainApp">
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
    <script src="{{asset('/js/homepage/app.js')}}"></script>

    {{--Angular Services--}}
    <script src="{{asset('/js/homepage/articles/services.js')}}"></script>
    <script src="{{asset('/js/homepage/categories/services.js')}}"></script>
    {{--End Angular Services--}}

    {{--Angular Controllers--}}
    <script src="{{asset('/js/homepage/articles/controllers.js')}}"></script>
    <script src="{{asset('/js/homepage/categories/controllers.js')}}"></script>
    {{--End Angular Controllers--}}
</div>
</body>
</html>