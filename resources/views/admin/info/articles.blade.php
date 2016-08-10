@extends("admin.layouts.master")
@section("title",'Articles')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
@endsection
@section("content")
    <div class="article-add" style="float: right">
        <a href="{{route('create_article')}}" class="btn btn-primary">Add</a>
    </div>
    <div class="fix"></div>
    @if(count($errors)>0)
        <ul class="errors">
            @foreach($errors->all() as $error)
                <li>* {{$error == 'The category id must be a number.'?'The category is required .':$error}}</li>
            @endforeach
        </ul>
    @endif
    <div class="article-list">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="text-align: center">ID</th>
                <th style="text-align: center; width: 10%">Title</th>
                <th>Category</th>
                <th style="text-align: center; width: 15%">Last Update</th>
                <th style="width: 20%">Author</th>
                <th style="width: 20%">Tags</th>
                <th>Function</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr style="font-size: 13px">
                    <td id="id" style="text-align: center">{{$article->id}}</td>
                    <td id="title"><a href="{{route('article').'/'.$article->id}}">{{$article->title}}</a></td>
                    <td id="category"><a href="{{route('category').'/'.$article->category->id}}">{{$article->category->name}}</a></td>
                    <td style="text-align: center">{{$article->updated_at->format('H:i:s d/m/Y')}}</td>
                    <td id="authors">
                        <?php
                        $authors = $article->authors;
                        $authors_filter = array();
                        if (!function_exists('search_author')) {
                            function search_author($author_id, $authors)
                            {
                                foreach ($authors as $author) {
                                    if ($author->id == $author_id) return true;
                                }
                                return false;
                            }
                        }
                        foreach ($authors as $author) {
                            if (!search_author($author->id, $authors_filter))
                                array_push($authors_filter, $author);
                        }
                        ?>
                        @foreach($authors_filter as $author)
                            <div class="tag-border">
                                <a href="{{route('author').'/'.$author->id}}">{{$author->name}}</a><br>
                                <button type="submit" class="close" data-toggle="modal"
                                        data-target="#delete{{$author->id}}{{$article->id}}">x
                                </button>
                                <div class="modal fade" role="dialog" id="delete{{$author->id}}{{$article->id}}"
                                     style="top: 150px">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-weight: bold">Delete Article's author: "<span
                                                            style="font-style: italic">{{$author->name}}</span>"</h5>
                                            </div>
                                            <div class="modal-body">
                                                <p>Do you want to delete this author?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('post_delete_author_article')}}" method="POST">
                                                    <input type="hidden" value="{{Session::token()}}" name="_token">
                                                    <input type="hidden" value="{{$article->id}}" name="article_id">
                                                    <input type="hidden" value="{{$author->id}}" name="author_id">
                                                    <button class="btn btn-warning" type="submit">Yes</button>
                                                    <button class="btn btn-default" type="button" data-dismiss="modal">
                                                        No
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </td>
                    <td id="tags">
                        <?php
                        $tags = $article->tags;
                        $result = array();
                        if (!function_exists('search')) {
                            function search($tag_id, $tags)
                            {
                                foreach ($tags as $tag) {
                                    if ($tag->id == $tag_id) return true;
                                }
                                return false;
                            }
                        }
                        for ($i = 0; $i < count($tags); $i++) {
                            if (!search($tags[$i]->id, $result)) {
                                array_push($result, $tags[$i]);
                            }
                        }
                        ?>

                        @foreach($result as $tag)
                            <div class="tag-border">
                                <a href="{{route('tag').'/'.$tag->id}}">{{$tag->name}}</a>
                                <button type="submit" class="close" data-toggle="modal"
                                        data-target="#delete{{$tag->id}}{{$article->id}}">x
                                </button>
                                <div class="modal fade" role="dialog" id="delete{{$tag->id}}{{$article->id}}"
                                     style="top: 150px">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-weight: bold">Delete Article's tag: "<span
                                                            style="font-style: italic">{{$tag->name}}</span>"</h5>
                                            </div>
                                            <div class="modal-body">
                                                <p>Do you want to delete this tag?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('post_delete_tag_article')}}" method="POST">
                                                    <input type="hidden" value="{{Session::token()}}" name="_token">
                                                    <input type="hidden" value="{{$article->id}}" name="article_id">
                                                    <input type="hidden" value="{{$tag->id}}" name="tag_id">
                                                    <button class="btn btn-warning" type="submit">Yes</button>
                                                    <button class="btn btn-default" type="button" data-dismiss="modal">
                                                        No
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('article').'/'.$article->id}}" class="btn btn-primary btn-xs">Preview</a>
                        <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#edit{{$article->id}}" style="text-align: center">Edit
                        </button>
                        <div class="modal fade" id="edit{{$article->id}}" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="top:50px;">
                                    <div class="modal-header">
                                        <h5 style="font-weight: bold">Edit Article: "<span
                                                    style="font-style: italic">{{$article->title}}</span>"</h5>
                                    </div>
                                    <form class="modal-body"
                                          action="{{route('post_update_article')}}"
                                          method="post">
                                        <div class="form-group" style="width: 100%">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" name="title" id="title"
                                                   value="{{$article->title}}" placeholder="Enter title...">
                                        </div>
                                        <div class="form-group" style="width: 100%">
                                            <label for="content">Content</label>
                                                <textarea name="data" id="content" cols="30" rows="10"
                                                          class="ckeditor form-control">{{$article->content}}</textarea>
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
                                                               name="tags[]" value="{{$tag->id}}">
                                                        {{$tag->name}}
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
                                                    <label for="author{{$author->id}}" style="font-weight: normal"
                                                           class="col col-sm-4">
                                                        <input type="checkbox" id="author{{$author->id}}"
                                                               {{author_exist($author->id,$article->authors)?'checked':''}}
                                                               name="authors[]" value="{{$author->id}}">
                                                        {{$author->name}}
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group" id="action">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                            <button type="submit" class="btn btn-warning">Update</button>
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
                                <div class="modal-content" style="top: 150px;">
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