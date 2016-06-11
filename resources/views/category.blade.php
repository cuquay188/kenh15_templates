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
                <th>Article(s)</th>
                <th>Function</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr style="font-size: 13px">
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        @foreach($category->articles as $article)
                            <div class="tag-border">
                                <a style="cursor:pointer;"
                                   data-toggle="modal"
                                   data-target="#edit{{$article->id}}"
                                >{{substr($article->title,0,10).'...'}}</a>
                                <div class="modal fade" id="edit{{$article->id}}" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="top:50px;">
                                            <div class="modal-header">
                                                <h5 style="font-weight: bold">Edit Article: "<span
                                                            style="font-style: italic">{{$article->title}}</span>"</h5>
                                            </div>
                                            <form class="modal-body" style="margin-bottom:30px;" action="{{route('post_update_article')}}"
                                                  method="post">
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
                                                    <label for="tags">Tags</label>
                                                    <div class="row">
                                                        <?php
                                                        if (!function_exists('tag_exist')) {
                                                            function tag_exist($tag_id, $tags)
                                                            {
                                                                foreach ($tags as $tag)
                                                                    if ($tag->id == $tag_id) return true;
                                                                return false;
                                                            }
                                                        }
                                                        ?>
                                                        @foreach(App\Tag::all() as $tag)
                                                            <label style="font-weight: normal" for="tag{{$tag->id}}"
                                                                   class="col col-sm-2">
                                                                <input id="tag{{$tag->id}}"
                                                                       {{tag_exist($tag->id,$article->tags)?'checked':''}} type="checkbox"
                                                                       name="tags[]" value="{{$tag->id}}"> {{$tag->name}}
                                                            </label>
                                                        @endforeach
                                                    </div>
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
                                                <div class="form-group" style="float: right">
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
                            </div>
                        @endforeach
                    </td>
                    <td>
                        {{--Edit Function--}}
                        <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#edit{{$category->id}}">Edit
                        </button>
                        <div class="modal fade" role="dialog" id="edit{{$category->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content" style="height: 205px;top: 150px">
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
                                            <div class="form-group" style="float: right">
                                                <input type="hidden" value="{{$category->id}}" name="category_id">
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
@endsection