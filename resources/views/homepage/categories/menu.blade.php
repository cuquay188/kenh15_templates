@extends('homepage.layouts.master')
@section('title','Categories')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/homepage/categories-menu.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="categories-menu col-lg-9">
            @foreach($categories as $category)
                @if(count($category->articles))
                    <div class="category">
                        <div class="head">
                            <a href="#">{{$category->name}}</a>
                        </div>
                        <div class="articles">
                            <div class="article">
                                <?php
                                $article_first = \App\Article::where('category_id', $category->id)->orderBy('id', 'desc')->first();
                                ?>
                                <div class="picture">
                                    <a href="{{route('homepage').'/article/'.$article_first->id}}">
                                        <img src="http://adogbreeds.com/wp-content/uploads/2013/01/Alaskan-Malamute-Puppies.jpg"
                                             alt="">
                                    </a>
                                </div>
                                <div class="title">
                                    <a href="{{route('homepage').'/article/'.$article_first->id}}">{{$article_first->title}}</a>
                                </div>
                            </div>
                            <div class="articles-list">
                                <ul>
                                    @foreach(\App\Article::where('category_id', $category->id)->orderBy('id','desc')->take(3)->skip(1)->get() as $article)
                                        <li>
                                            <a href="{{route('homepage').'/article/'.$article->id}}">{{$article->title}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="advert col-lg-3"></div>
    </div>
@endsection