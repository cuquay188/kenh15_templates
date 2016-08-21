@extends("admin.layouts.master")
@section("title", "Authors Management")
@section("content")
    @if(count($errors)>0)
        <ul class="errors">
            @foreach($errors->all() as $error)
                <li>* {{$error}}</li>
            @endforeach
        </ul>
    @endif
    <div class="authors-info">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if(count($authors))
                @foreach($authors as $author)
                    <tr style="font-size: 13px">
                        <td><a href="{{route('author').'/'.$author->id}}">{{$author->user->name}}</a></td>
                        <td>{{$author->user->address}}</td>
                        <td>{{$author->user->formatBirth()}}</td>
                        <td>{{$author->user->tel}}</td>
                        <td>{{$author->user->email}}</td>
                        <td>
                            {{--Edit Function--}}
                            <button type="submit" disabled class="btn btn-primary btn-xs" data-toggle="modal"
                                    data-target="#edit{{$author->id}}">Edit
                            </button>
                            <div class="modal fade" role="dialog" id="edit{{$author->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content" style=" top: 90px">
                                        <div class="modal-header">
                                            <h5 style="font-weight: bold">Edit Author: "<span
                                                        style="font-style: italic">{{$author->user->name}}</span>"</h5>
                                        </div>
                                        <form action="{{route('post_update_author')}}" method="post" role="form">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" name="name" id="name"
                                                           value="{{$author->user->name}}" placeholder="Enter name...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" name="address" id="address"
                                                           value="{{$author->user->address}}"
                                                           placeholder="Enter address...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="age">Age</label>
                                                    <input type="number" class="form-control" name="age" id="age"
                                                           value="{{$author->user->age}}" placeholder="Enter age...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tel">Phone</label>
                                                    <input type="tel" class="form-control" name="tel" id="tel"
                                                           value="{{$author->user->tel}}" placeholder="Enter phone...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">email</label>
                                                    <input type="email" class="form-control" name="email" id="email"
                                                           value="{{$author->user->email}}"
                                                           placeholder="Enter email...">
                                                </div>
                                                <div class="form-group" id="action">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-warning">Update</button>
                                                    <input type="hidden" value="{{$author->id}}" name="author_id">
                                                    <input type="hidden" value="{{Session::token()}}" name="_token">
                                                </div>
                                                <div class="fix"></div>
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
                                                <span style="font-style: italic;font-weight: bold">{{$author->user->name}}</span>
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
            @else
                <tr>
                    <td colspan="6" class="empty-table">
                        No authors is available. You need to
                        <a href="{{route('create_author')}}">promote a user.</a>.
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
            "bLengthChange": false
        });
    </script>
@endsection