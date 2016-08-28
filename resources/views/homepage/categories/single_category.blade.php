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
                    <div class="newest-article">
                        @if($article_first)
                            <div class="picture" style="background-image: url('{{$article_first->img_url}}');background-size: auto 200px">
                                <div class="backdrop">
                                    <a href="{{route('homepage').'/article/'.$article_first->id}}">
                                        <img src="{{$article_first->img_url}}" alt="" style="max-height: 200px;max-width: 300px">
                                    </a>
                                </div>
                            </div>
                            <div class="title">
                                <a href="{{route('homepage').'/article/'.$article_first->id}}">{{$article_first->title}}</a>
                            </div>
                        @endif
                    </div>
                    <div class="hot-day ">
                        @if(count($hot_articles))
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
                        @endif
                    </div>
                </div>
                @if(count($related_articles))
                    @foreach($related_articles as $article)
                        <div class="related-news">
                            <div class="picture" style="background-image: url('{{$article->img_url}}')">
                                <div class="backdrop">
                                    <a href="{{route('homepage').'/article/'.$article->id}}">
                                        <img src="{{$article->img_url}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="text">
                                <div class="title">
                                    <a href="{{route('homepage').'/article/'.$article->id}}">{{$article->title}}</a>
                                </div>
                                <div class="content">
                                    <?php
                                    echo $article->shorten_content(300)
                                    ?>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
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
            'height': $('.related-news .picture').height(),
            'overflow-y': 'hidden'
        });
    </script>
@endsection