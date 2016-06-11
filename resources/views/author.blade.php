@extends("layouts.master")
@section("title", "Author")
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
@endsection
@section("content")
    <div class="author-add">
        <a href="{{route('create_author')}}" style="float: right;margin-bottom: 30px" type="submit"
           class="btn btn-primary">Add</a>
    </div>
    <div class="authors-info">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="text-align: center">ID</th>
                <th>Name</th>
                <th style="text-align: center">Age</th>
                <th>Address</th>
                <th>Article(s)</th>
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
                        <?php
                        $articles = $author->articles;
                        $articles_filter = array();
                        if (!function_exists('search_article')) {
                            function search_article($article_id, $articles)
                            {
                                foreach ($articles as $article) {
                                    if ($article->id == $article_id) return true;
                                }
                                return false;
                            }
                        }
                        foreach ($articles as $article) {
                            if (!search_article($article->id, $articles_filter))
                                array_push($articles_filter, $article);
                        }
                        ?>
                        @foreach($articles_filter as $article)
                            <div class="tag-border">
                                <a style="cursor:pointer;"
                                   data-toggle="modal"
                                   data-target="#editatc{{$article->id}}"
                                >{{substr($article->title,0,10).'...'}}</a>
                                <div class="modal fade" id="editatc{{$article->id}}" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="top:50px;">
                                            <div class="modal-header">
                                                <h5 style="font-weight: bold">Edit Article: "<span
                                                            style="font-style: italic">{{$article->title}}</span>"</h5>
                                            </div>
                                            <form class="modal-body" style="margin-bottom:30px;"
                                                  action="{{route('post_update_article')}}"
                                                  method="post">
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" class="form-control" name="title" id="title"
                                                           value="{{$article->title}}" placeholder="Enter title..."
                                                           disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="content">Content</label>
                                                <textarea name="data" id="content" cols="30" rows="10"
                                                          class="form-control" disabled>{{$article->content}}</textarea>
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
                                                                       name="tags[]" value="{{$tag->id}}"
                                                                       disabled> {{$tag->name}}
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="category_id">Category</label>
                                                    <select name="category_id" id="category_id" class="form-control"
                                                            style="width: 300px" disabled>
                                                        @foreach($categories as $category)
                                                            <option {{$category->id==$article->category->id?"selected=''":''}}
                                                                    value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="authors">Choose Author(s)</label>
                                                    <div class="checkbox-style row" style="width: 100%">
                                                        <?php
                                                        if (!function_exists('author_exist')) {
                                                            function author_exist($author_id, $authors)
                                                            {
                                                                foreach ($authors as $author)
                                                                    if ($author->id == $author_id) return true;
                                                                return false;
                                                            }
                                                        }
                                                        ?>
                                                        @foreach(App\Author::all() as $author)
                                                            <label for="author{{$author->id}}"
                                                                   style="font-weight: normal"
                                                                   class="col col-sm-4">
                                                                <input type="checkbox" id="author{{$author->id}}"
                                                                       {{author_exist($author->id,$article->authors)?'checked disabled':''}}
                                                                       name="authors[]" value="{{$author->id}}">
                                                                {{$author->name}}
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="form-group" style="float: right">
                                                    <button type="submit" class="btn btn-warning">Update</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Close
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
                                            <div class="form-group" style="float: right">
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