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

    {{--Angular lib--}}
    <script src="{{asset('public/angular/angular.min.js')}}"></script>
    <script src="{{asset('public/angular/angular-utils-pagination/dirPagination.js')}}"></script>
    <script src="{{asset('public/angular/angular-sanitize.min.js')}}"></script>
    <script src="{{asset('public/angular/angular-route.min.js')}}"></script>
    {{--End angular--}}


    @yield('scripts')
</head>
<body ng-app="mainApp" ng-controller="mainController">
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
    <script src="{{asset('/js/homepage/routes.js')}}"></script>

    {{--Angular Services--}}
    <script src="{{asset('/js/homepage/articles/services.js')}}"></script>
    <script src="{{asset('/js/homepage/categories/services.js')}}"></script>
    <script src="{{asset('/js/homepage/tags/services.js')}}"></script>
    {{--End Angular Services--}}

    {{--Angular Controllers--}}
    <script src="{{asset('/js/homepage/articles/controllers.js')}}"></script>
    <script src="{{asset('/js/homepage/categories/controllers.js')}}"></script>
    <script src="{{asset('/js/homepage/tags/controllers.js')}}"></script>
    {{--End Angular Controllers--}}

    <script>
        var url = {
            home:{
                view:'{{route('homepage.home')}}'
            },
            category: {
                info: function (category_url) {
                    return '{{route('admin.api.category.select.byUrl')}}' + category_url;
                },
                hot: function () {
                    return '{{route('admin.api.category.select')}}'
                },
                articles: function (category_url) {
                    return '{{route('admin.api.category.select.articles')}}' + category_url
                },
                hotArticles: function (category_id) {
                    return '{{route('admin.api.category.select.allArticles')}}' + category_id
                },
                view:'{{route('homepage.category')}}'
            },
            tag: {
                info: function (tag_url) {
                    return '{{route('admin.api.tag.select.byUrl')}}' + tag_url
                },
                articles: function (tag_url) {
                    return '{{route('admin.api.tag.select.articles')}}' + tag_url
                },
                view:'{{route('homepage.tag')}}'
            },
            article: {
                info: function (article_url) {
                    return '{{route('admin.api.article.get')}}' + article_url
                },
                all: function () {
                    return '{{route('admin.api.article.select.all')}}'
                },
                view:'{{route('homepage.article')}}'
            }
        }
    </script>

</div>
</body>
</html>