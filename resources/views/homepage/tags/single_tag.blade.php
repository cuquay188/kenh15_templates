@extends('homepage.layouts.single')
@section('single.title',$tag->name)
@section('single.styles')
    <link rel="stylesheet" href="{{asset('/css/homepage/tags.css')}}">
@endsection
@section('single.top')
    <div class="tag shadow">
        <span>Tag: {{$tag->name}}</span>
    </div>
@endsection
@section('single.related_articles')
    @if($articles_by_tag)
        @foreach($articles_by_tag as $article)
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
        <?php echo $articles_by_tag->render() ?>
    @endif
@endsection