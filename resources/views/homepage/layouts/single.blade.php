@extends('homepage.layouts.master')
@section('title')
    @yield('single.title')
@endsection
@section('styles')
    @yield('single.styles')
@endsection
@section('content')
    <div class="main-body container">
        <div class="col-lg-8 ">
            <div class="articles">
                @yield('single.top')
                @yield('single.related_articles')
            </div>
        </div>
        @include('homepage.layouts.advertisement.single_page')
    </div>
@endsection
@section('body.scripts')
    @yield('single.body.scripts')
@endsection