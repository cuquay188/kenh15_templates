@extends('homepage.layouts.single')
@section('single.title',"Category")
@section('single.styles')
    <link rel="stylesheet" href="{{asset('/css/homepage/category.css')}}">
@endsection
@section('single.top')
    <div class="top-articles shadow" ng-controller="categoryController">
        <div class="category">
            <p>[[category.name]]</p>
        </div>
        <div class="articles">
            <div class="newest-article" ng-controller="newestArticleByCategoryController">
                <div class="picture"
                     style="background-image: url('[[newestArticle.img_url]]');background-size: auto 200px">
                    <div class="backdrop">
                        <a href="#">
                            <img src="[[newestArticle.img_url]]" alt=""
                                 style="max-height: 200px;max-width: 300px">
                        </a>
                    </div>
                </div>
                <div class="title">
                    <a href="#">[[newestArticle.title]]</a>
                </div>
            </div>
            <div class="hot-day">
                <div class="title">
                    <p>Tin hot trong ngày</p>
                </div>
                <div class="list-hot" ng-controller="hotArticlesByCategoryController">
                    <ul>
                        <li ng-repeat="article in articles | orderBy: '-views' | limitTo: 10">
                            <a href="#">[[article.title]]</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('single.related_articles')
    <section ng-controller="relatedArticlesByCategoryController">
        <div class="related-news shadow row" ng-repeat="article in articles">
            <div class="picture col col-lg-4" style="background-image: url('[[article.img_url]]')">
                <div class="backdrop">
                    <a href="#">
                        <img src="[[article.img_url]]" alt="">
                    </a>
                </div>
            </div>
            <div class="text col col-lg-8">
                <div class="title">
                    <a href="#">[[article.title]]</a>
                </div>
                <div class="content">
                    [[article.shorten_content]]
                </div>
            </div>
        </div>
    </section>
@endsection
@section('single.body.scripts')
    <script>
        $('.list-hot').css({
            'height': $('.newest-article').height() - $('.hot-day .title').height()
        });
    </script>
    <script>
        var url = {
            category: function (id) {
                return '{{route('admin.api.category.select')}}/' + id;
            },
            articles: function (id) {
                return '{{route('admin.api.article.select.byCategory')}}' + id;
            },
            newestArticle: function (id) {
                return '{{route('admin.api.article.select.newestArticle.byCategory')}}' + id;
            },
            hotArticles: function (id) {
                return '{{route('admin.api.article.select.hotArticle.byCategory')}}' + id;
            }
        };
    </script>

@endsection