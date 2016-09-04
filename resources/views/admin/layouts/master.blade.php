<html>
<head>
    <title>@yield("title")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{Session::token()}}">

    <!-- Style Sheet -->

    <link rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/admin/main.css')}}">
    <link rel="stylesheet" href="{{asset('/jquery/jquery-ui/themes/flick/jquery-ui.css')}}">
@yield("styles")

<!-- End Style Sheet -->

    <!-- Scripts -->
    <!-- jQuery library -->
    <script src="{{asset('/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- jQueryUI -->
    <script src="{{asset('/jquery/jquery-ui/ui/minified/jquery.ui.core.min.js')}}"></script>
    <script src="{{asset('/jquery/jquery-ui/ui/minified/jquery.ui.widget.min.js')}}"></script>
    <script src="{{asset('/jquery/jquery-ui/ui/minified/jquery.ui.mouse.min.js')}}"></script>
    <script src="{{asset('/jquery/jquery-ui/ui/minified/jquery.ui.draggable.min.js')}}"></script>
    <script src="{{asset('/jquery/jquery-ui/ui/minified/jquery.ui.datepicker.min.js')}}"></script>
    <!-- End jQuery library-->

    <!-- Angular library -->
    <script src="{{asset('/angular/angular.min.js')}}"></script>
    <script src="{{asset('/angular/angular-sanitize.min.js')}}"></script>
    <script src="{{asset('/angular/angular-utils-pagination/dirPagination.js')}}"></script>
    <!-- End Angular library -->

    <script src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/ckeditor/ckeditor.js')}}"></script>

    @yield("scripts")
    <script>
        var url = {
            article: {
                select: {
                    articles: '{{route('admin.api.article.select')}}',
                    article: function (id) {
                        return '{{route('admin.api.article.select')}}' + '/' + id;
                    },
                    content: function (id) {
                        return '{{route('admin.api.article.select.content')}}' + '/' + id;
                    }
                },
                update: '{{route('admin.api.article.update')}}',
                remove: {
                    article: '{{route('admin.api.article.remove.article')}}',
                    tag: '{{route('admin.api.article.remove.tag')}}',
                    author: '{{route('admin.api.article.remove.author')}}'
                },
                create: '{{route('admin.api.article.create')}}'
            },
            author: {
                select: {
                    authors: '{{route('admin.api.author.select')}}',
                    users: '{{route('admin.api.author.select.normal_user')}}'
                },
                update: '{{route('admin.api.author.update')}}',
                remove: '{{route('admin.api.author.remove')}}',
                create: '{{route('admin.api.author.create')}}'
            },
            category: {
                select: '{{route('admin.api.category.select')}}',
                remove: '{{route('admin.api.category.remove')}}',
                create: '{{route('admin.api.category.create')}}',
                update: {
                    name: '{{route('admin.api.category.update.name')}}',
                    hot: '{{route('admin.api.category.update.hot')}}',
                    header: '{{route('admin.api.category.update.header')}}'
                }
            },
            tag: {
                select: '{{route('admin.api.tag.select')}}',
                update: '{{route('admin.api.tag.update')}}',
                remove: '{{route('admin.api.tag.remove')}}',
                create: '{{route('admin.api.tag.create')}}'
            }
        };
    </script>

    <!-- End scripts -->
</head>
<body ng-app="mainApp" ng-controller="mainController">
<div class="sidebar" ng-controller="sidebarController">

    @include("admin.layouts.components.sidebar")

</div>
<div class="body">

    @include("admin.layouts.components.header")

    <div class="container">
        @yield("content")
    </div>

    @include("admin.layouts.components.footer")

</div>
<div class="partials">
    @yield('dialogs')
    @include('admin.layouts.components.dialogs')
</div>

<!-- Body scripts -->
<script src="{{asset('/js/admin/app.js')}}"></script>
<script src="{{asset('/js/admin/sidebar.js')}}"></script>

{{--Article--}}
<script src="{{asset('/js/admin/articles/services.js')}}"></script>
<script src="{{asset('/js/admin/articles/controllers.js')}}"></script>
{{--End Article--}}

{{--Author--}}
<script src="{{asset('/js/admin/authors/services.js')}}"></script>
<script src="{{asset('/js/admin/authors/controllers.js')}}"></script>
{{--End Author--}}

{{--Category--}}
<script src="{{asset('/js/admin/categories/services.js')}}"></script>
<script src="{{asset('/js/admin/categories/controllers.js')}}"></script>
{{--End Category--}}

{{--Tag--}}
<script src="{{asset('/js/admin/tags/services.js')}}"></script>
<script src="{{asset('/js/admin/tags/controllers.js')}}"></script>
{{--End Tag--}}
@yield("body.scripts")

<!-- End body scripts -->
</body>
</html>