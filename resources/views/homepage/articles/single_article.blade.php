@extends('homepage.layouts.master')
@section('title',$article->title)
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/homepage/article.css')}}">
@endsection
@section('content')
    <div class="container">
        <aside class="sidebar-left col-lg-3">
            @include('homepage.articles.related_articles')
        </aside>
        <div class="main-content col-lg-6">
            <div class="category">
                <a href="{{route('homepage')}}">Homepage</a>
                <i class="fa fa-caret-right" aria-hidden="true"></i>
                <a href="#">{{$article->category->name}}</a>
            </div>
            <div class="title">
                <h1>{{$article->title}}</h1>
                <p class="time">
                    <label>{{$article->updated_at->format('d/m/Y')}}</label>
                    Last updated at: {{$article->updated_at->format('H:i')}}
                </p>
            </div>
            <div class="article_content">
                <?php
                echo $article->content;
                ?>
            </div>
            <div class="authors">
                <label>By </label>
                @foreach($article->authors as $author)
                    <span>{{$author->user->name}}</span>
                @endforeach
            </div>
            <div class="tags">
                <label>Tag(s)</label>
                @foreach($article->tags as $tag)
                    <a href="#">{{$tag->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
@endsection