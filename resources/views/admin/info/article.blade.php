@extends('admin.layouts.master')
@section('title')
    {{$article->title}}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
@endsection
@section('content')
    <div class="content">
        <div class="title">
            <p class="view_title">{{$article->title}}</p>
            <p>
                <label>{{$article->updated_at->format('d/m/Y')}}</label>
                Last updated at: {{$article->updated_at->format('H:i')}}
            </p>
        </div>
        <div class="category">
            <p>
                <label>Category:</label> {{$article->category->name}}
            </p>
        </div>
        <div class="article_content">
            <?php
            echo $article->content;
            ?>
        </div>
        <div class="authors">
            <?php
            $authors = $article->authors;
            $authors_filter = array();
            if (!function_exists('search_author')) {
                function search_author($author_id, $authors)
                {
                    foreach ($authors as $author) {
                        if ($author->id == $author_id) return true;
                    }
                    return false;
                }
            }
            foreach ($authors as $author) {
                if (!search_author($author->id, $authors_filter))
                    array_push($authors_filter, $author);
            }
            ?>
            <p>
                <label>Author(s):</label>
                <i>
                    <?php
                    $authors_str = '';
                    foreach ($authors_filter as $author)
                        $authors_str .= $author->name . ', ';
                    echo substr($authors_str, 0, strlen($authors_str) - 2)
                    ?>
                </i>
            </p>
        </div>
        <div class="tags">
            <?php
            $tags = $article->tags;
            $tags_filter = array();
            if (!function_exists('search_tag')) {
                function search_tag($tag_id, $tags)
                {
                    foreach ($tags as $tag) {
                        if ($tag->id == $tag_id) return true;
                    }
                    return false;
                }
            }
            foreach ($tags as $tag) {
                if (!search_tag($tag->id, $tags_filter))
                    array_push($tags_filter, $tag);
            }
            ?>
            <p>
                <label>Tag(s):</label>
                @foreach($tags_filter as $tag)
                    <span>{{$tag->name}}</span>
                @endforeach
            </p>
        </div>
    </div>
@endsection