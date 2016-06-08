@extends('layouts.master')
@section('title','Create Tag')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
@endsection
@section('content')
    <div class="back">
        <form action="{{route('tag')}}" method="get">
            <button style="float: right;margin-bottom: 30px" type="submit" class="btn btn-danger">Back</button>
        </form>
    </div>
    <div class="content">
        <form action="{{route('post_tag')}}" method="post" role="form">
            <div class="form-group">
                <label for="name">Name Tag</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter name tag...">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Create</button>
                <input type="hidden" value="{{Session::token()}}" name="_token">
            </div>
        </form>
    </div>
@endsection