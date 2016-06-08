@extends("layouts.master")
@section("title", "Author")
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
                <th style="text-align: center">ID</th>
                <th>Name</th>
                <th style="text-align: center">Age</th>
                <th>Address</th>
                <th>Function</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr style="font-size: 13px">
                    <td style="text-align: center">{{$author->id}}</td>
                    <td>{{$author->name}}</td>
                    <td style="text-align: center">{{$author->age}}</td>
                    <td>{{$author->address}}</td>
                    <td>
                        {{--Edit Function--}}
                        <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#edit{{$author->id}}">Edit
                        </button>
                        <div class="modal fade" role="dialog" id="edit{{$author->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content" style="height: 345px; top: 90px">
                                    <div class="modal-header">
                                        <h5 style="font-weight: bold">Edit Author: "<span
                                                    style="font-style: italic">{{$author->name}}</span>"</h5>
                                    </div>
                                    <form action="{{route('post_update_author')}}" method="post" role="form">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                       value="{{$author->name}}" placeholder="Enter name...">
                                            </div>
                                            <div class="form-group">
                                                <label for="age">Age</label>
                                                <input type="number" class="form-control" name="age" id="age"
                                                       value="{{$author->age}}" placeholder="Enter age...">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" name="address" id="address"
                                                       value="{{$author->address}}" placeholder="Enter address...">
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-warning">Update</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <input type="hidden" value="{{$author->id}}" name="author_id">
                                                <input type="hidden" value="{{Session::token()}}" name="_token">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{--Delete Function--}}
                        <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#delete{{$author->id}}">Delete
                        </button>
                        <div class="modal fade" role="dialog" id="delete{{$author->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content" style="height: 190px;top: 150px">
                                    <div class="modal-header">
                                        <h5 style="font-weight: bold">Delete Author:
                                            <span style="font-style: italic;font-weight: bold">{{$author->name}}</span>
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you want to delete this author?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('post_delete_author')}}" method="post">
                                            <input type="hidden" value="{{$author->id}}" name="author_id">
                                            <input type="hidden" value="{{Session::token()}}" name="_token">
                                            <button class="btn btn-warning">Yes</button>
                                            <button class="btn btn-default" data-dismiss="modal">No</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection