@extends("layouts.master")
@section("title", "About")
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
@endsection
@section("content")
    <div class="author-add">
        <form action="{{route('create_author')}}">
            <button style="float: right;margin-bottom: 30px" type="submit" class="btn btn-primary">Add</button>
            <input type="hidden" value="{{Session::token()}}" name="_token">
        </form>
    </div>
    <div class="authors-info">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Function</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr style="font-size: 13px">
                    <td>{{$author->id}}</td>
                    <td>{{$author->name}}</td>
                    <td>{{$author->age}}</td>
                    <td>{{$author->address}}</td>
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