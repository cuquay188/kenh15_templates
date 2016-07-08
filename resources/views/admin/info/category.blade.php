@extends('admin.layouts.master')
@section('title')
    {{$category->name}}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <style>
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="content">
        <div class="title">
            <p class="view-title">Category: {{$category->name}}</p>
        </div>
        <div class="articles-list">
            <label>The article(s) related to this category:</label>
            <?php
            $articles = $category->articles;
            $articles_filter = array();
            if (!function_exists('search_article')) {
                function search_article($article_id, $articles)
                {
                    foreach ($articles as $article) {
                        if ($article->id == $article_id) return true;
                    }
                    return false;
                }
            }
            foreach ($articles as $article) {
                if (!search_article($article->id, $articles_filter))
                    array_push($articles_filter, $article);
            }
            ?>
            <ul>
                @foreach($articles_filter as $article)
                    <li>
                        <a href="{{route('article').'/'.$article->id}}">{{$article->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection