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
    <script src="{{asset('/jquery/jquery-2.2.4.min.js')}}"></script>

    <script src="{{asset('/angular/angular.min.js')}}"></script>

    <script src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('/ckeditor/ckeditor.js')}}"></script>

    @yield("scripts")
</head>
<body ng-app="mainApp">
<div class="sidebar">

    @include("admin.layouts.components.sidebar")

</div>
<div class="body">

    @include("admin.layouts.components.header")

    <div class="container">
        @yield("content")
    </div>

    @include("admin.layouts.components.footer")

    @yield('dialogs')
    @include('admin.layouts.components.dialogs')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var url = {
            article : {
                get : '',
                update : '',
                remove: '',
                create:''
            },
            category : {
                get : '',
                update : '',
                remove: '',
                create:''
            },
            author : {
                get : '',
                update : '',
                remove: '',
                create:''
            },
            tag : {
                get : '{{route('admin.api.tag.get')}}',
                update : '{{route('admin.api.tag.update')}}',
                remove: '{{route('admin.api.tag.remove')}}',
                create:''
            }

        };

        var app = angular.module("mainApp",[], function($interpolateProvider) {
            $interpolateProvider.startSymbol('%%');
            $interpolateProvider.endSymbol('%%');
        });
    </script>
    @yield("body.scripts")

    <script>
        CKEDITOR.config.width = '55vw';
        CKEDITOR.config.height = 'calc(100vh - 300px)';
    </script>
</div>
</body>
</html>