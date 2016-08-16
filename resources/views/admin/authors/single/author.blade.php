@extends('admin.layouts.master')
@section('title')
    {{$author->user->name}}
@endsection
@section('content')
    <div class="content">
        <div class="articles-list">
            <label>The article(s) related to this author:</label>
            <ul>
                @foreach($author->articles as $article)
                    <li>
                        <a href="{{route('article').'/'.$article->id}}">{{$article->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection