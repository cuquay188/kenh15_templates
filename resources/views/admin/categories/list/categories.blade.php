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
                <th>Article(s)</th>
                <th style="width:30%;">Hot</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if(count($categories))
                @foreach($categories as $category)
                    <tr style="font-size: 13px">
                        <td><a href="{{route('category').'/'.$category->id}}">{{$category->name}}</a></td>
                        <td>{{count($category->articles)}}</td>
                        <td>
                            <div id="category_is_hot_value_{{$category->id}}"
                                 style="display:none;">{{$category->advance->is_hot}}</div>
                            <div id="category_is_header_value_{{$category->id}}"
                                 style="display:none;">{{$category->advance->is_header}}</div>
                            <button onclick="changeIsHot('{{$category->id}}')" id="category_is_hot_{{$category->id}}"
                                    class="btn btn-xs btn-toggle hot {{$category->advance->is_hot ? 'btn-primary' : 'btn-default'}}">

                            </button>
                            <button onclick="changeIsHeader('{{$category->id}}')"
                                    id="category_is_header_{{$category->id}}"
                                    class="btn btn-xs btn-toggle header {{$category->advance->is_hot ? '' : 'hide'}} {{$category->advance->is_header ? 'btn-primary' : 'btn-default'}}">
                                Show to header
                            </button>
                        </td>
                        <td>
                            {{--Edit Function--}}
                            <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                                    data-target="#edit{{$category->id}}">Edit
                            </button>
                            <div class="modal fade" role="dialog" id="edit{{$category->id}}">
                                <div class="modal-dialog">
                                    <form action="{{route('admin.update.category.name')}}" method="POST" role="form"
                                          class="modal-content" style="top: 150px">
                                        <div class="modal-header">
                                            <h5 style="font-weight: bold">Edit Category: "<span
                                                        style="font-style: italic">{{$category->name}}</span>"</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Category</label>
                                                <input type="text" value="{{$category->name}}" name="name" id="name"
                                                       class="form-control" placeholder="Enter name...">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="form-group" id="action">
                                                <input type="hidden" value="{{$category->id}}" name="category_id">
                                                <input type="hidden" value="{{Session::token()}}" name="_token">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="btn btn-warning">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            {{--Delete Function--}}
                            <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                                    data-target="#delete{{$category->id}}">Delete
                            </button>
                            <div class="modal fade" role="dialog" id="delete{{$category->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="top: 150px">
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
                                                <button type="submit" class="btn btn-warning">Confirm</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Cancel
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
            "pageLength": $(document).height() < 800 ? 8 : 15,
            "bLengthChange": false,
            "order": [[2, "desc"]]
        });

        var changeIsHot = function (category_id) {
            $.ajax({
                type: 'POST',
                url: '{{route('admin.update.category.hot')}}',
                data: {
                    category_id: category_id
                },
                success: function (response) {
                    var is_hot = response.is_hot;
                    var is_header = response.is_header;
                    $('#category_is_hot_' + category_id)
                            .removeClass(is_hot == 1 ? 'btn-default' : 'btn-primary')
                            .addClass(is_hot == 1 ? 'btn-primary' : 'btn-default');
                    $('#category_is_hot_value_' + category_id).text(is_hot);
                    console.log('Update Category ' + category_id + ' to ' + is_hot + ' success.');
                    $('#category_is_header_' + category_id)
                            .removeClass(is_hot == 1 ? 'hide' : '')
                            .addClass(is_hot == 1 ? '' : 'hide')
                            .removeClass(is_header == 1 ? 'btn-default' : 'btn-primary')
                            .addClass(is_header == 1 ? 'btn-primary' : 'btn-default');
                },
                error: function () {
                    console.error('Update Category ' + category_id + ' fail.')
                }
            });
        };

        var changeIsHeader = function (category_id) {
            $.ajax({
                type: 'POST',
                url: '{{route('admin.update.category.header')}}',
                data: {
                    category_id: category_id
                },
                success: function (response) {
                    var is_header = response.is_header;
                    $('#category_is_header_' + category_id)
                            .removeClass(is_header == 1 ? 'btn-default' : 'btn-primary')
                            .addClass(is_header == 1 ? 'btn-primary' : 'btn-default');
                    $('#category_is_header_value_' + category_id).text(is_header);
                    console.log('Update Category ' + category_id + ' to ' + is_header + ' success.');
                },
                error: function () {
                    console.error('Update Category ' + category_id + ' fail.')
                }
            });
        }
    </script>
@endsection