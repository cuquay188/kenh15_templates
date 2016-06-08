@extends("layouts.master")
@section("title",'Article')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
@endsection
@section("content")
    <div class="article-add">
        <form action="{{route('create_article')}}" method="get">
            <button type="submit" class="btn btn-primary" style="float: right;margin-bottom: 30px">Add</button>
            <input type="hidden" value="{{Session::token()}}" name="_token">
        </form>
    </div>
    <div class="article-list">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="text-align: center">ID</th>
                <th>Title</th>
                <th>Category</th>
                <th style="text-align: center">Created</th>
                <th>Author</th>
                <th style="text-align: center">Tags</th>
                <th style="text-align: center">Function</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr style="font-size: 13px">
                    <td style="text-align: center">{{$article->id}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->category->name}}</td>
                    <td style="text-align: center">{{$article->created_at}}</td>
                    <td>{{$article->author->name}}</td>
                    <td>
                        @foreach($article->tags as $tag)
                            <span>{{$tag->name}} | </span>
                        @endforeach
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#edit{{$article->id}}" style="text-align: center">Edit
                        </button>
                        <div class="modal fade" id="edit{{$article->id}}" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="height: 630px;">
                                    <div class="modal-header">
                                        <h5 style="font-weight: bold">Edit Article: "<span
                                                    style="font-style: italic">{{$article->title}}</span>"</h5>
                                    </div>
                                    <form action="{{route('post_update_article')}}" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" name="title" id="title"
                                                       value="{{$article->title}}" placeholder="Enter title...">
                                            </div>
                                            <div class="form-group">
                                                <label for="content">Content</label>
                                                <textarea name="data" id="content" cols="30" rows="10"
                                                          class="form-control">{{$article->content}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="category_id">Category</label>
                                                <select name="category_id" id="category_id" class="form-control"
                                                        style="width: 300px">
                                                    @foreach($categories as $category)
                                                        <option {{$category->id==$article->category->id?"selected=''":''}}
                                                                value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="author_id">Author</label>
                                                <select name="author_id" id="author_id" class="form-control"
                                                        style="width: 300px">
                                                    @foreach($authors as $author)
                                                        <option {{$author->id==$article->author->id?"selected=''":''}}
                                                                value="{{$author->id}}">{{$author->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning">Update</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                            <input name="article_id" value="{{$article->id}}" type="hidden">
                                            <input type="hidden" value="{{Session::token()}}" name="_token">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#delete{{$article->id}}" style="text-align: center">Delete
                        </button>
                        <div class="modal fade" id="delete{{$article->id}}" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content" style="height: 190px; top: 150px;">
                                    <div class="modal-header">
                                        <h5 style="font-weight: bold">Delete Article: "<span
                                                    style="font-style: italic">{{$article->title}}</span>"</h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you want to delete this article?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('post_delete_article')}}" method="post">
                                            <input name="article_id" value="{{$article->id}}" type="hidden">
                                            <input type="hidden" value="{{Session::token()}}" name="_token">
                                            <button class="btn btn-warning">Yes</button>
                                            <button class="btn btn-default" data-dismiss="modal">No</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#detail{{$article->id}}">Detail
                        </button>
                        <div class="modal fade" id="detail{{$article->id}}" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-weight: bold">{{$article->title}}</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form">
                                            <div class="form-group">
                                                <textarea name="detail" id="detail" cols="30" rows="10"
                                                          class="form-control">{{$article->content}}</textarea>
                                            </div>
                                        </form>
                                        <p><span style="font-weight: bold">Category: </span>{{$article->category->name}}
                                        </p>
                                        <p><span style="font-weight: bold">Author: </span>{{$article->author->name}}</p>
                                        <p><span style="font-weight: bold">Created: </span>{{$article->created_at}}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal">Close</button>
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