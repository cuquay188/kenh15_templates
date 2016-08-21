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
                <th>Hot</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if(count($categories))
                @foreach($categories as $category)
                    <tr style="font-size: 13px">
                        <td><a href="{{route('category').'/'.$category->id}}">{{$category->name}}</a></td>
                        <td>
                            <button onclick="changeHot('{{$category->id}}')" id="category_is_hot_{{$category->id}}"
                                    class="btn btn-xs btn-toggle {{$category->is_hot ? 'btn-primary' : 'btn-default'}}"></button>
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
                                                <input type="hidden" name="_token" value="{{ Session::token() }}">
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
            @else
                <tr>
                    <td colspan="6" class="empty-table">
                        No categories is available.
                        <a href="{{route('create_category')}}">Create a new one</a>.
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
@section('body.scripts')
    <script>
        $('table').DataTable({
            "pageLength": 8,
            "bLengthChange": false
        });

        var changeHot = function (category_id) {
            $.ajax({
                type: 'POST',
                url: '{{route('admin.update.category.hot')}}',
                data: {
                    category_id: category_id
                },
                success: function (response) {
                    var is_hot = response.is_hot;
                    $('#category_is_hot_' + category_id)
                            .removeClass(is_hot==1 ? 'btn-default' : 'btn-primary')
                            .addClass(is_hot==1 ? 'btn-primary' : 'btn-default');
                    console.log('Update Category '+category_id+' success.')
                },
                error: function () {
                    console.error('Update Category '+category_id+' fail.')
                }
            });
        };

    </script>
@endsection