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

        <div class="main-content col-lg-9">
            <!-- các bài viết mới đăng -->
            <div class="new-articles col-sm-8">
                @include('homepage.index.latest_articles')
            </div>
            <!-- end -->

            <!-- video -->
            <aside class="sidebar-right col-sm-4">
                @include('homepage.index.top_videos')
            </aside>
            <!-- end -->

            <div class="articles-by-category col-sm-12">
                @include('homepage.index.hot_categories')
            </div>
        </div>
    </div>
@endsection
