@extends('admin.layouts.master')
@section('title')
    {{$tag->name}}
@endsection
@section('content')
    <div class="content">
        <div class="title">
            <p class="view-title">Tag: {{$tag->name}}</p>
        </div>
        <div class="articles-list">
            <label>The article(s) related to this tag:</label>
            <ul>
                @foreach($tag->articles as $article)
                    <li>
                        <a href="{{route('article').'/'.$article->url}}">{{$article->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection