@extends('homepage.layouts.master')
@section('title','Articles by Category')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/homepage/category.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="col-lg-8">
            <div class="category">
                <p>{{$category->name}}</p>
            </div>
            <div class="articles">
                <div class="top-articles">
                    <div class="newest-article ">
                        <div class="picture">
                            <a href="{{route('homepage').'/article/'.$article_first->id}}">
                                <img src="{{$article_first->img_url}}" alt="">
                            </a>
                        </div>
                        <div class="title">
                            <a href="{{route('homepage').'/article/'.$article_first->id}}">{{$article_first->title}}</a>
                        </div>
                    </div>
                    <div class="hot-day ">
                        <div class="title">
                            <p>Tin hot trong ngày</p>
                        </div>
                        <div class="list-hot">
                            <ul>
                                @foreach($hot_articles as $article)
                                    <li>
                                        <a href="{{route('homepage').'/article/'.$article->id}}">{{$article->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @foreach($related_articles as $article)
                    <div class="related-news">
                        <div class="picture">
                            <a href="{{route('homepage').'/article/'.$article->id}}">
                                <img src="{{$article->img_url}}" alt="">
                            </a>
                        </div>
                        <div class="text">
                            <div class="title">
                                <a href="{{route('homepage').'/article/'.$article->id}}">{{$article->title}}</a>
                            </div>
                            <div class="content">
                                <p>{{$article->content}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-4">
            <p>Advertisement</p>
        </div>
    </div>
    <script>
        $('.list-hot').css({
            'height': $('.newest-article').height() - $('.hot-day .title').height(),
            'overflow-y': 'auto'
        });
        $('.text').css({
            'width': $('.related-news').width() - $('.related-news .picture').width() - 50,
            'height':$('.related-news .picture').height(),
            'overflow-y':'hidden'
        });
    </script>
@endsection