@extends('homepage.layouts.master')
@section('title','Kênh 15')
@section('styles')
    <link rel="stylesheet" href="{{asset('public/css/homepage/homepage.css')}}">
@endsection
@section('content')
    <div class="content-area main-body">
        <div class="container">
            <!-- bài đọc nhiều nhất -->
            <aside class="sidebar-left shadow col-lg-3">
                @include('homepage.index.top_articles')
            </aside>
            <!-- end -->

            <div class="main-content col-lg-9">
                <!-- các bài viết mới đăng -->
                <div class="new-articles shadow col-lg-8">
                    @include('homepage.index.latest_articles')
                </div>
                <!-- end -->

                <!-- video -->
                <aside class="sidebar-right shadow col-lg-4">
                    @include('homepage.index.top_videos')
                </aside>
                <!-- end -->

                <div class="articles-by-category col-lg-12">
                    @include('homepage.index.hot_categories')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('body.scripts')
    <script src="{{asset('public/js/homepage/sidebar-left.js')}}"></script>
@endsection