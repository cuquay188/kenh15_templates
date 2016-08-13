@extends('homepage.layouts.master')
@section('title',$article->title)
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/homepage/article.css')}}">
    <link rel="stylesheet" href="{{asset('css/homepage/homepage.css')}}">
@endsection
@section('content')
    <div class="container">
        <aside class="sidebar-left col-lg-3">
            @include('homepage.articles.top_related')
        </aside>
        <div class="col-lg-6">
            <div class="category">
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
                <?php
                $authors = $article->authors;
                $authors_filter = array();
                function search_author($author_id, $authors)
                {
                    foreach ($authors as $author) {
                        if ($author_id == $author->id) return true;
                    }
                    return false;
                }
                foreach ($authors as $author) {
                    if (!search_author($author->id, $authors_filter))
                        array_push($authors_filter, $author);
                }
                ?>
                @foreach($authors_filter as $author)
                    <a href="#">{{$author->name}}</a>
                @endforeach
            </div>
            <div class="tags">
                <label>Tag(s)</label>
                <?php
                $tags = $article->tags;
                $tags_filter = array();
                function search_tag($tag_id, $tags)
                {
                    foreach ($tags as $tag) {
                        if ($tag_id == $tag->id) return true;
                    }
                    return false;
                }
                foreach ($tags as $tag) {
                    if (!search_tag($tag->id, $tags_filter))
                        array_push($tags_filter, $tag);
                }
                ?>
                @foreach($tags_filter as $tag)
                    <a href="#">{{$tag->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
@endsection