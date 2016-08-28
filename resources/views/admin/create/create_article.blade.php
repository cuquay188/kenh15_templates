@if(Auth::getUser()->admin || Auth::getUser()->author)
    <div class="modal fade" id="create-article" role="dialog">
        <div class="modal-dialog wide">
            <div class="modal-content">
                <div class="modal-header">
                    <h5><strong>Create article</strong></h5>
                    <div class="close" data-dismiss="modal">
                        <div class="glyphicon glyphicon-remove"></div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="col col-sm-7">
                        <div class="form-group">
                            <textarea name="create_article_data" id="create_article_data" class="ckeditor form-control"
                                      placeholder="Enter content...">{!! old('data') !!}</textarea>
                            <p id="content-error" class="errors"></p>
                        </div>
                    </div>
                    <div class="col col-sm-5">
                        <div class="form-group">
                            <input type="text" class="form-control"
                                   id="create_article_title" name="create_article_title" value="{!! old('title') !!}"
                                   placeholder="Title"
                            >
                            <p id="title-error" class="errors"></p>
                        </div>
                        <div class="form-group">
                            <label for="tags">Choose tags</label>
                            <div class="checkbox-style row">
                                <?php $count = 1; ?>
                                @foreach(\App\Tag::all() as $tag)
                                    <label for="create_article_tag_{{$count}}" class="col col-sm-4">
                                        <input id="create_article_tag_{{$count}}" type="checkbox"
                                               name="create_article_tags[]" value="{{$tag->id}}">
                                        {{$tag->name}}
                                    </label>
                                    <?php $count++ ?>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="create_article_category_id">Category</label>
                            <select name="create_article_category_id" id="create_article_category_id"
                                    class="form-control">
                                <option value="null" style="font-weight: bold">--Select a category--</option>
                                @foreach(\App\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <p id="category-error" class="errors"></p>
                        </div>
                        <div class="form-group">
                            <label for="authors">Choose Author(s)</label>
                            <div class="checkbox-style row">
                                <?php $count = 1; ?>
                                @foreach(\App\Author::all() as $author)
                                    <label for="create_article_author_{{$count}}" style="font-weight: normal"
                                           class="col col-sm-6">
                                        <input type="checkbox" id="create_article_author_{{$count}}"
                                               name="create_article_authors[]"
                                               value="{{$author->id}}">
                                        {{$author->user->name}}
                                    </label>
                                    <?php $count++ ?>
                                @endforeach
                            </div>
                            <p id="authors-error" class="errors"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success"
                                id="submit-create-article" onclick="createArticle()">Create article
                        </button>
                        <button type="button" class="btn btn-warning"
                                id="submit-create-more" onclick="createArticle(1)">Create more
                        </button>
                        <input type="hidden" value="{{Session::token()}}" name="_token">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif