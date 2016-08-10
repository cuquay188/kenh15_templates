@extends('homepage.layouts.master')
@section('title',$article->title)
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/homepage/article.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="title">
                <h1>{{$article->title}}</h1>
                <p>
                    <label>{{$article->updated_at->format('d/m/Y')}}</label>
                    Last updated at: {{$article->updated_at->format('H:i')}}
                </p>
            </div>
            <div class="article_content">
                <?php
                echo $article->content;
                ?>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
@endsection