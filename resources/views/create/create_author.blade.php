@extends('layouts.master')
@section('title', 'Create Author')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
@endsection
@section('content')
    <div class="back">
        <form action="{{route('about')}}" method="get">
            <button style="float: right;margin-bottom: 30px" type="submit" class="btn btn-danger">Back</button>
        </form>
    </div>
    <div class="content">
        <form action="{{route('post_author')}}" method="post" role="form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Enter author name ..." name="name" id="name">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" placeholder="Enter age ..." name="age" id="age">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" placeholder="Enter address ..." name="address" id="address">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Create</button>
                <input type="hidden" value="{{Session::token()}}" name="_token">
            </div>
        </form>
    </div>
@endsection