@extends('layouts.master')
@section('title','Create Authors')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
@endsection
@section('content')
    <div style="float: right">
        <button class="btn btn-danger">Back</button>
    </div>
    <form action="" role="form">
        <div class="form-group">
            <label for="name">Name Author(s)</label>
            <textarea class="form-control" name="authors" id="authors" cols="30" rows="10"
                      placeholder="Enter author(s)..."></textarea>
        </div>
        <div class="form-group">
            <label for="name-group">Group name</label>
            <input type="text" class="form-control" name="group-name" id="group-name" placeholder="Enter group name...">
        </div>
        <div class="form-group">
            <input type="hidden" value="{{Session::token()}}" name="_token">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </form>
@endsection