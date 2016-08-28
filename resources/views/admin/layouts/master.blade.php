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
    <script src="{{asset('/angular/angular-utils-pagination/dirPagination.js')}}"></script>

    <script src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('/ckeditor/ckeditor.js')}}"></script>

    @yield("scripts")
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var url = {
            article: {
                get: '',
                update: '',
                remove: '',
                create: ''
            },
            author: {
                get: '',
                update: '',
                remove: '',
                create: ''
            },
            category: {
                get: '{{route('admin.api.category.get')}}',
                length: '{{route('admin.api.category.get.length')}}',
                update: {
                    name: '{{route('admin.api.category.update.name')}}',
                    hot: '{{route('admin.api.category.update.hot')}}',
                    header: '{{route('admin.api.category.update.header')}}'
                },
                remove: '{{route('admin.api.category.remove')}}',
                create: '{{route('admin.api.category.create')}}'
            },
            tag: {
                get: '{{route('admin.api.tag.get')}}',
                length: '{{route('admin.api.tag.get.length')}}',
                update: '{{route('admin.api.tag.update')}}',
                remove: '{{route('admin.api.tag.remove')}}',
                create: '{{route('admin.api.tag.create')}}'
            }
        };
    </script>
</head>
<body ng-app="mainApp">
<div class="sidebar" ng-controller="sidebarController">

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
</div>

<script src="{{asset('/js/admin/app.js')}}"></script>
<script src="{{asset('/js/admin/sidebar.js')}}"></script>

{{--Tag--}}
<script src="{{asset('/js/admin/tags/services.js')}}"></script>
<script src="{{asset('/js/admin/tags/controllers.js')}}"></script>
{{--End Tag--}}

{{--Category--}}
<script src="{{asset('/js/admin/categories/services.js')}}"></script>
<script src="{{asset('/js/admin/categories/controllers.js')}}"></script>
{{--End Category--}}
@yield("body.scripts")

<script>
    $('#create-tag, #edit-tag, #create-category, #edit-category').on('shown.bs.modal', function () {
        $(this).find('#name').focus();
    });
    CKEDITOR.config.width = '55vw';
    CKEDITOR.config.height = 'calc(100vh - 300px)';
</script>

</body>
</html>