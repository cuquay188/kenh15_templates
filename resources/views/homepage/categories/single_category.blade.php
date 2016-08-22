@extends('homepage.layouts.master')
@section('title','Articles by Category')
@section('styles')

@endsection
@section('content')
    <div class="container">
        <div class="category">
            <p>{{$category->name}}</p>
        </div>
        <div class="articles">
            <div class=""></div>
        </div>
    </div>
@endsection