@extends('layouts.master')
@section('title','Category')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
@endsection
@section('content')
    <div class="category-add">
        <a href="{{route('create_category')}}" style="float: right;margin-bottom: 30px" type="submit"
           class="btn btn-primary">Add</a>
    </div>
    <div class="fix"></div>
    @if(count($errors)>0)
        <ul class="errors">
            @foreach($errors->all() as $error)
                <li>* {{$error}}</li>
            @endforeach
        </ul>
    @endif
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
                        {{--Edit Function--}}
                        <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#edit{{$category->id}}">Edit
                        </button>
                        <div class="modal fade" role="dialog" id="edit{{$category->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content" style="top: 150px">
                                    <div class="modal-header">
                                        <h5 style="font-weight: bold">Edit Category: "<span
                                                    style="font-style: italic">{{$category->name}}</span>"</h5>
                                    </div>
                                    <form action="{{route('post_update_category')}}" method="post" role="form">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Category</label>
                                                <input type="text" value="{{$category->name}}" name="name" id="name"
                                                       class="form-control" placeholder="Enter name...">
                                            </div>
                                            <div class="form-group" id="action">
                                                <input type="hidden" value="{{$category->id}}" name="category_id">
                                                <input type="hidden" value="{{Session::token()}}" name="_token">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-warning">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{--Delete Function--}}
                        <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#delete{{$category->id}}">Delete
                        </button>
                        <div class="modal fade" role="dialog" id="delete{{$category->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content" style="height: 190px;top: 150px">
                                    <div class="modal-header">
                                        <h5 style="font-weight: bold">Delete Category: "<span
                                                    style="font-style: italic">{{$category->name}}</span>"</h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you want to delete this category?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('post_delete_category')}}" method="post">
                                            <input type="hidden" value="{{$category->id}}" name="category_id">
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
    <script>
        $('table').DataTable();
    </script>
@endsection