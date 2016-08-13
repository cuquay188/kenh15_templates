<html>
<head>
    <title>@yield("title")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    BOOTSTRAP CDN-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/css/datatables.min.css')}}"/>

    <!-- jQuery library -->
    <script src="{{asset('/js/jquery-2.2.4.min.js')}}"></script>

    <!-- Latest compiled JavaScript -->
    <script src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>


    <script type="text/javascript" src="{{asset('/js/datatables.min.js')}}"></script>

    {{--<script src="//cdn.ckeditor.com/4.5.9/full/ckeditor.js"></script>--}}

    <script type="text/javascript" src="{{asset('/ckeditor/ckeditor.js')}}"></script>

    @yield("styles")
    @yield("scripts")
</head>
<div class="body">
    @include("admin.layouts.header")
    <div class="container">
        @yield("content")
    </div>
    @include("admin.layouts.footer")
    <script>
        if ($(document).height() > $(".body").height())
            $('.footer').addClass('fix-footer');
    </script>
    @yield("body.scripts")
</div>
</html>