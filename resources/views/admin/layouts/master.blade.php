<html>
<head>
    <title>@yield("title")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{Session::token()}}">
    <!--    BOOTSTRAP CDN-->
    <link rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/datatables/datatables.min.css')}}"/>

    <link rel="stylesheet" href="{{asset('/css/admin/main.css')}}">

    @yield("styles")

    <!-- jQuery library -->
    <script src="{{asset('/js/jquery-2.2.4.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('/ckeditor/ckeditor.js')}}"></script>

    <!-- Latest compiled JavaScript -->
    <script src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('/datatables/datatables.min.js')}}"></script>

    @yield("scripts")
</head>
<body>
<div class="sidebar">

    @include("admin.layouts.components.sidebar")

</div>
<div class="body">

    @include("admin.layouts.components.header")

    <div class="container">
        @yield("content")
    </div>

    @include("admin.layouts.components.footer")

    @include('admin.layouts.components.dialogs')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
    </script>
    @yield("body.scripts")

    <script>
        if ($(document).height() > $(".body").height())
            $('.footer').addClass('fix-footer');
    </script>
</div>
</body>
</html>