@if(Auth::getUser()->admin || Auth::getUser()->author)
    <div class="modal fade" id="create-article" role="dialog">
        <div class="modal-dialog wide">
            <form class="modal-content" action="{{route('post_create_article')}}" method="POST">
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
            </form>
        </div>
    </div>
    <script>
        var createArticle = function (is_continue) {
            var $form = $('#create-article');

            var authors = [], tags = [];
            authors.length = '{{count(\App\Author::all())}}';
            tags.length = '{{count(\App\Tag::all())}}';
            var count, i;
            for (i = 1, count = 0; i <= authors.length; i++)
                if ($('#create_article_author_' + i).is(':checked'))
                    authors[count++] = ($('#create_article_author_' + i).val());

            for (i = 1, count = 0; i <= tags.length; i++)
                if ($('#create_article_tag_' + i).is(':checked'))
                    tags[count++] = ($('#create_article_tag_' + i).val());

            console.log(authors);
            console.log(tags);
            $.ajax({
                type: 'POST',
                url: '{{route('admin.validate.article')}}',
                data: {
                    create_article_title: $form.find('#create_article_title').val(),
                    create_article_data: CKEDITOR.instances['create_article_data'].getData(),
                    create_article_category_id: $('#create_article_category_id').val(),
                    create_article_authors: authors,
                    create_article_tags: tags,
                    is_continue: is_continue
                },
                beforeSend: function () {
                    $('#content-error').text('');
                    $('#title-error').text('');
                    $('#category-error').text('');
                    $('#authors-error').text('')
                },
                success: function (response) {
                    console.log(response);
                    if (is_continue == 1) {
                        $form.find('#create_article_title').val('');
                        CKEDITOR.instances['create_article_data'].setData();
                        $('#create_article_category_id').val('null');
                        for (i = 1, count = 0; i <= authors.length; i++)
                            $('#create_article_author_' + i).prop('checked',false)
                        for (i = 1, count = 0; i <= tags.length; i++)
                            $('#create_article_tag_' + i).prop('checked',false)
                        $("[data-dismiss='modal']").on('click',function () {
                            $(location).attr('href', $(location).attr('href'))
                        })
                    }
                    else {
                        $(location).attr('href', $(location).attr('href'))
                    }
                },
                error: function (response) {
                    response = JSON.parse(response.responseText);
                    $('#content-error').text(response.create_article_data);
                    $('#title-error').text(response.create_article_title);
                    $('#category-error').text(response.create_article_category_id ? 'Category is required.' : '');
                    $('#authors-error').text(response.create_article_authors ? 'Choose at least one author.' : '');
                }
            })
        };
    </script>
@endif