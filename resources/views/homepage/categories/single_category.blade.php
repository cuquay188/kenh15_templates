@extends('homepage.layouts.single')
@section('single.title',$category->name)
@section('single.styles')
    <link rel="stylesheet" href="{{asset('/css/homepage/category.css')}}">
@endsection
@section('single.top')
    <div class="top-articles shadow">
        <div class="category">
            <p>{{$category->name}}</p>
        </div>
        <div class="articles">
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
    </div>
@endsection
@section('single.related_articles')
    @if(count($mismatch_articles))
        @foreach($mismatch_articles as $article)
            <div class="related-news shadow row">
                <div class="picture col col-lg-4" style="background-image: url('{{$article->img_url}}')">
                    <div class="backdrop">
                        <a href="{{route('homepage').'/article/'.$article->url}}">
                            <img src="{{$article->img_url}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="text col col-lg-8">
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
@endsection
@section('single.body.scripts')
    <script>
        $('.list-hot').css({
            'height': $('.newest-article').height() - $('.hot-day .title').height()
        });
    </script>
@endsection