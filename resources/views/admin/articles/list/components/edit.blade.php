<div class="modal fade" id="edit{{$article->id}}" role="dialog">
    <div class="modal-dialog wide">
        <form class="modal-content"
              action="{{route('post_update_article')}}"
              method="POST">
            <div class="modal-header">
                <h5><strong>Edit article:</strong> {{$article->shorten_title(100)}}</h5>
                <div class="close" data-dismiss="modal">
                    <div class="glyphicon glyphicon-remove"></div>
                </div>
            </div>
            <div class="modal-body">
                <div class="col col-sm-7">
                    <div class="form-group">
                        <textarea name="data" id="content" style="margin:auto;"
                                  class="ckeditor form-control">{{$article->content}}</textarea>
                    </div>
                </div>
                <div class="col col-sm-5">
                    <div class="form-group" style="width: 100%">
                        <input type="text" class="form-control" name="title" id="title"
                               value="{{$article->title}}" placeholder="Enter title...">
                    </div>

                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <div class="checkbox-style row">
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
                                       class="col col-sm-4">
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
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option {{$category->id==$article->category->id?"selected=''":''}}
                                        value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="authors">Choose Author(s)</label>
                        <div class="checkbox-style row">
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
                            @foreach(App\User::all() as $author)
                                <label for="author{{$author->id}}" style="font-weight: normal"
                                       class="col col-sm-6">
                                    <input type="checkbox" id="author{{$author->id}}"
                                           {{author_exist($author->id,$article->authors)?'checked':''}}
                                           name="authors[]" value="{{$author->id}}">
                                    {{$author->name}}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group" id="action">
                    <button type="submit" class="btn btn-warning ">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                    </button>
                    <input name="article_id" value="{{$article->id}}" type="hidden">
                    <input type="hidden" value="{{Session::token()}}" name="_token">
                </div>
            </div>
        </form>
    </div>
</div>