<div class="modal fade" id="edit_article" role="dialog">
    <div class="modal-dialog wide">
        <form class="modal-content"
              action="{{route('post_update_article')}}"
              method="POST">
            <div class="modal-header">
                <h5><strong>Edit article:</strong>
                    <span id="edit_shorten_title"></span>
                </h5>
                <div class="close" data-dismiss="modal">
                    <div class="glyphicon glyphicon-remove"></div>
                </div>
            </div>
            <div class="modal-body">
                <div class="col col-sm-7">
                    <div class="form-group">
                        <textarea name="data" id="edit_content" style="margin:auto;"
                                  class="ckeditor form-control"></textarea>
                    </div>
                </div>
                <div class="col col-sm-5">
                    <div class="form-group" style="width: 100%">
                        <input type="text" class="form-control" name="title" id="edit_title"
                               value="" placeholder="Enter title...">
                    </div>

                    <div class="form-group">
                        <label>Tags</label>
                        <div id="edit_tags" class="checkbox-style row">
                            @foreach(\App\Tag::orderBy('name','asc')->get() as $tag)
                                <label style="font-weight: normal" for="edit_tag_{{$tag->id}}"
                                       class="col col-sm-4">
                                    <input id="edit_tag_{{$tag->id}}" type="checkbox"
                                           name="tags[]" value="{{$tag->id}}">
                                    {{$tag->name}}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_category_id">Category</label>
                        <select name="category_id" id="edit_category_id" class="form-control">
                            <option value="null" style="font-weight: bold">--Select a category--</option>
                            @foreach(\App\Category::orderBy('name','asc')->get() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Choose Author(s)</label>
                        <div id="edit_authors" class="checkbox-style row">
                            @foreach(\App\Author::all() as $author)
                                <label for="edit_author_{{$author->id}}" style="font-weight: normal"
                                       class="col col-sm-6">
                                    <input type="checkbox" id="edit_author_{{$author->id}}"
                                           name="authors[]" value="{{$author->id}}">
                                    {{$author->user->name}}
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
<script>
    var editArticle = function (article_id) {
        $.ajax({
            type: 'GET',
            url: '{{route('admin.api.article').'/'}}' + article_id,
            success: function (response) {
                var article = response;
                console.log(article);
                var $row = $('#toggle_edit_article_' + article_id);
                var $modal = $('#edit_article');
                $modal.find('#edit_shorten_title').text(article.shorten_title);
                $modal.find('#edit_title').val(article.title);
                CKEDITOR.instances['edit_content'].setData(article.content);
                $modal.find('#edit_category_id').val(article.category_id);
                for(var i in article.tags)
                    $modal.find('#edit_tags').find('#edit_tag_'+article.tags[i].id).prop("checked", true )
                for(var j in article.authors)
                    $modal.find('#edit_authors').find('#edit_author_'+article.authors[j].id).prop("checked", true )
            }
        })
    }
</script>