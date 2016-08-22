@extends('homepage.layouts.master')
@section('title','Categories')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/homepage/categories-menu.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="categories-menu col-lg-9">
            @foreach($categories as $category)
                @if(count($category->articles))
                    <div class="category">
                        <div class="head">
                            <a href="{{route('homepage').'/category/'.$category->id}}">{{$category->name}}</a>
                        </div>
                        <div class="articles">
                            <div class="article">
                                <?php
                                $article_first = \App\Article::where('category_id', $category->id)->orderBy('id', 'desc')->first();
                                ?>
                                <div class="picture">
                                    <a href="{{route('homepage').'/article/'.$article_first->id}}">
                                        <img src="http://adogbreeds.com/wp-content/uploads/2013/01/Alaskan-Malamute-Puppies.jpg"
                                             alt="">
                                    </a>
                                </div>
                                <div class="title">
                                    <a href="{{route('homepage').'/article/'.$article_first->id}}">{{$article_first->title}}</a>
                                </div>
                            </div>
                            <div class="articles-list">
                                <ul>
                                    @foreach(\App\Article::where('category_id', $category->id)->orderBy('id','desc')->take(3)->skip(1)->get() as $article)
                                        <li>
                                            <a href="{{route('homepage').'/article/'.$article->id}}">{{$article->title}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="advert col-lg-3">
            <div class="advert-banner">
                <a href="#">
                    <img src="http://ad-design.966v.com/static_images/20160805/8059ea7db2ae92048edf766470030904549e47c72d4abb67131f6052.jpg"
                         alt="">
                </a>
            </div>
            <div class="advert-banner last">
                <a href="#">
                    <img src="http://lameesltd.com/wp-content/uploads/2015/10/1-2-vertical.jpg"
                         alt="">
                </a>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            var offsetPixels = 365;
            $('.body').scroll(function () {
                if ($('.body').scrollTop() > offsetPixels) {
                    $('.last').css({
                        'position': 'fixed',
                        'top': '55px'
                    })
                } else {
                    $('.last').css({
                        'position': 'static'
                    });
                    $('.categories-menu').css({
                        'position': 'static'
                    })
                }
            })
        })
    </script>
@endsection