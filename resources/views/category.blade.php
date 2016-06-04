@extends('layouts.master')
@section('title','Category')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
@endsection
@section('content')
    <div class="category-add">
        <form action="{{route('create_category')}}">
            <button style="float: right;margin-bottom: 30px" type="submit" class="btn btn-primary">Add</button>
            <input type="hidden" value="{{Session::token()}}" name="_token">
        </form>
    </div>
    <div class="category-info">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Function</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr style="font-size: 13px">
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <button type="submit" class="btn btn-primary btn-xs">Edit</button>
                        <button type="submit" class="btn btn-primary btn-xs">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection