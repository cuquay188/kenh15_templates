@extends('homepage.layouts.master')
@section('title','Articles by Category')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/homepage/category.css')}}">
@endsection
@section('content')
    <div class="main-body container">
        <div class="col-lg-8 ">
            <div class="category">
                <p>{{$category->name}}</p>
            </div>
            <div class="articles">
                <div class="top-articles">
                    <div class="newest-article">
                        @if($article_first)
                            <div class="picture"
                                 style="background-image: url('{{$article_first->img_url}}');background-size: auto 200px">
                                <div class="backdrop">
                                    <a href="{{route('homepage').'/article/'.$article_first->url}}">
                                        <img src="{{$article_first->img_url}}" alt=""
                                             style="max-height: 200px;max-width: 300px">
                                    </a>
                                </div>
                            </div>
                            <div class="title">
                                <a href="{{route('homepage').'/article/'.$article_first->url}}">{{$article_first->title}}</a>
                            </div>
                        @endif
                    </div>
                    <div class="hot-day ">
                        @if(count($hot_articles_by_category))
                            <div class="title">
                                <p>Tin hot trong ngày</p>
                            </div>
                            <div class="list-hot">
                                <ul>
                                    @foreach($hot_articles_by_category as $article)
                                        <li>
                                            <a href="{{route('homepage').'/article/'.$article->url}}">{{$article->title}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                @if(count($mismatch_articles))
                    @foreach($mismatch_articles as $article)
                        <div class="related-news">
                            <div class="picture" style="background-image: url('{{$article->img_url}}')">
                                <div class="backdrop">
                                    <a href="{{route('homepage').'/article/'.$article->url}}">
                                        <img src="{{$article->img_url}}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="text">
                                <div class="title">
                                    <a href="{{route('homepage').'/article/'.$article->url}}">{{$article->title}}</a>
                                </div>
                                <div class="content">
                                    <?php
                                    echo $article->shorten_content(300)
                                    ?>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <?php echo $related_articles->render(); ?>
                @endif
            </div>
        </div>
        <div class="col-lg-3 advertisement">
            <a href="#">
                <img src="http://www.mixtgoods.com/images/logos/Static_160x578_MixtGoods_Ad.gif" alt="">
            </a>
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