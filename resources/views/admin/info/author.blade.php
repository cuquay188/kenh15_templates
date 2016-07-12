@extends('admin.layouts.master')
@section('title')
    {{$author->name}}
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <style>
        .footer{
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="content">
        <div class="title">
            <p class="view-title">Author: {{$author->name}}</p>
        </div>
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