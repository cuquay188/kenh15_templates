@extends('homepage.layouts.single')
@section('single.title','Tag')
@section('single.styles')
    <link rel="stylesheet" href="{{asset('/css/homepage/tags.css')}}">
@endsection
@section('single.top')
    <div class="tag shadow" ng-controller="tagController">
        <span>Tag: [[tag.name]]</span>
    </div>
@endsection
@section('single.related_articles')
    <section ng-controller="relatedArticlesByTagController">
        <div class="related-news shadow row" dir-paginate="article in articles | itemsPerPage:5">
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
        <dir-pagination-controls></dir-pagination-controls>
    </section>
@endsection