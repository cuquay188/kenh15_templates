@extends('admin.layouts.master')
@section('title','Categories Management')
@section('content')
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
                <th>Category</th>
                <th>Hot Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr style="font-size: 13px">
                    <td><a href="{{route('category').'/'.$category->id}}">{{$category->name}}</a></td>
                    <td>
                        <input type="checkbox" id="category{{$category->id}}" class="toggle-ios">
                        <label class="btn btn-default btn-xs btn-toggle"
                               onclick="updateHot('{{$category->id}}')"
                               for="category{{$category->id}}"></label>
                    </td>
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
        var updateHot = function ($category) {
            console.log($category);
            $.ajax({
                type: 'POST',
                url: '{{route('post_update_category_hot')}}',
                data: {
                    _token: '{{ csrf_token() }}',
                    category_id: $category
                },
                success: function (response) {
                    console.log(response);
                }
            })
        };
        updateHot('hehe');
    </script>
@endsection