<html>
<head>
    <title>@yield("title")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    BOOTSTRAP CDN-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/admin/auth.css')}}">

    <!-- font-awesome -->
    <link rel="stylesheet" href="{{asset('/font-awesome/css/font-awesome.min.css')}}">
   <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <!-- jQuery library -->
    <script src="{{asset('/jquery/jquery-2.2.4.min.js')}}"></script>

    <!-- Latest compiled JavaScript -->
    <script src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('/ckeditor/ckeditor.js')}}"></script>

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