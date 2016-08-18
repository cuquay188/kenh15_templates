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
                @foreach($authors_filter as $author)
                    <a href="{{route('author').'/'.$author->id}}">{{$author->user->name}}</a>
                @endforeach
            </p>
        </div>
        <div class="tags border-tag">
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
                    <a href="{{route('tag').'/'.$tag->id}}">{{$tag->name}}</a>
                @endforeach
            </p>
        </div>
    </div>
    <script>
        $('.goto-top').click(function () {
            $('body').animate({scrollTop: 0});
        });
    </script>
@endsection