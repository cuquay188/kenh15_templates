@extends('admin.layouts.master')
@section('title')
    {{$article->shorten_title(75)}}
@endsection
@section('content')
    <div class="goto-top">
        <span class="glyphicon glyphicon-plane"></span><br>
        <strong>TOP</strong>
    </div>
    <div class="content">
        <div class="title">
            <p class="view-title">{{$article->title}}</p>
            <p>
                <label>{{$article->updated_at->format('d/m/Y')}}</label>
                Last updated at: {{$article->updated_at->format('H:i')}}
            </p>
        </div>
        <div class="category border-tag">
            <p>
                <label>Category:</label>
                <a href="{{route('category').'/'.$article->category->id}}">{{$article->category->name}}</a>
            </p>
        </div>
        <div class="article_content">
            <?php
            echo $article->content;
            ?>
        </div>
        <div class="authors border-tag">
            <p>
                <label>Author(s):</label>
                @foreach($article->authors as $author)
                    <a href="{{route('author').'/'.$author->id}}">{{$author->user->name}}</a>
                @endforeach
            </p>
        </div>
        <div class="tags border-tag">
            <p>
                <label>Tag(s):</label>
                @foreach($article->tags as $tag)
                    <a href="{{route('tag').'/'.$tag->id}}">{{$tag->name}}</a>
                @endforeach
            </p>
        </div>
    </div>
    <script>
        $('.goto-top').click(function () {
            $('.container').animate({scrollTop: 0});
        });
    </script>
@endsection