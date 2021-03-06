<html>
<head>
    <title>@yield("title")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    BOOTSTRAP CDN-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{asset('public/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/css/admin/auth.css')}}">

    <!-- font-awesome -->
    <link rel="stylesheet" href="{{asset('public/font-awesome/css/font-awesome.min.css')}}">

    <!-- jQuery library -->
    <script src="{{asset('public/jquery/jquery-2.2.4.min.js')}}"></script>

    <!-- Latest compiled JavaScript -->
    <script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>

    @yield("styles")
    @yield("scripts")
</head>
<body>
<div class="backdrop"></div>
<div class="container">
    @yield("content")
</div>
</body>
</html>