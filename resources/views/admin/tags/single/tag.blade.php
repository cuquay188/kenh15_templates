@extends('admin.layouts.master')
@section('title')
    {{$tag->name}}
@endsection
@section('content')
    <div class="content">
        <div class="articles-list">
            <label>The article(s) related to this tag:</label>
            @if(count($tag->articles))
                <ul>
                    @foreach($tag->articles as $article)
                        <li>
                            <a href="{{route('article').'/'.$article->url}}">{{$article->title}}</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="empty-message">
                    No articles is available for this category.
                    <a href="#" data-toggle="modal"
                       data-target="#create-article">Create a new one</a>.
                </div>
            @endif
        </div>
    </div>
@endsection