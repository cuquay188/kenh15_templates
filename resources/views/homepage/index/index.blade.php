@extends('homepage.layouts.master')
@section('title','ABC News')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/homepage/homepage.css')}}">
@endsection
@section('content')
    <div class="content-area container">
        <!-- bài đọc nhiều nhất -->
        <aside class="sidebar-left col-lg-3">
            @include('homepage.index.top_articles')
        </aside>
        <!-- end -->

        <!-- các bài viết mới đăng -->
        <div class="new-articles col-lg-6">
            @include('homepage.index.latest_articles')
        </div>
        <!-- end -->

        <!-- video -->
        <aside class="sidebar-right col-lg-3">
            @include('homepage.index.top_videos')
        </aside>
        <!-- end -->
    </div>
    <div class="articles-by-category container">
        @include('homepage.index.hot_categories')
    </div>
@endsection
