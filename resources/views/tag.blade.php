@extends('layouts.master')
@section('title','Tag')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
@endsection
@section('content')
    <div class="tag-add">
        <a href="{{route('create_tag')}}" style="float: right;margin-bottom: 30px" type="submit"
           class="btn btn-primary">Add</a>
    </div>
    <div class="tag-info">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Function</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr style="font-size: 13px">
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</td>
                    <td>
                        {{--Edit Function--}}
                        <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#edit{{$tag->id}}">Edit
                        </button>
                        <div class="modal fade" role="dialog" id="edit{{$tag->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content" style="height: 205px;top: 150px">
                                    <div class="modal-header">
                                        <h5 style="font-weight: bold">Edit Tag: "
                                            <span style="font-style: italic">{{$tag->name}}</span>"
                                        </h5>
                                    </div>
                                    <form action="{{route('post_update_tag')}}" method="post" role="form">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Tag</label>
                                                <input class="form-control" type="text" value="{{$tag->name}}" id="name"
                                                       name="name" placeholder="Enter name tag...">
                                            </div>
                                            <div class="form-group" style="float: right">
                                                <input type="hidden" value="{{$tag->id}}" name="tag_id">
                                                <input type="hidden" value="{{Session::token()}}" name="_token">
                                                <button type="submit" class="btn btn-warning">Update</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{--Delete Function--}}
                        <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#delete{{$tag->id}}">Delete
                        </button>
                        <div class="modal fade" role="dialog" id="delete{{$tag->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content" style="height: 190px;top: 150px">
                                    <div class="modal-header">
                                        <h5 style="font-weight: bold">Delete Category: "<span
                                                    style="font-style: italic">{{$tag->name}}</span>"</h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you want to delete this tag?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('post_delete_tag')}}" method="post">
                                            <input type="hidden" value="{{$tag->id}}" name="tag_id">
                                            <input type="hidden" value="{{Session::token()}}" name="_token">
                                            <button type="submit" class="btn btn-warning">Yes</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">No
                                            </button>
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