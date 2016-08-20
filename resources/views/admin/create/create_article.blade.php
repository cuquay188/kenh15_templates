@if(Auth::getUser()->admin || Auth::getUser()->author)
    <div class="modal fade" id="create-article" role="dialog">
        <div class="modal-dialog wide">
            <form class="modal-content" action="{{route('post_article_1')}}" method="POST">
                <div class="modal-header">
                    <h5><strong>Create article</strong></h5>
                    <div class="close" data-dismiss="modal">
                        <div class="glyphicon glyphicon-remove"></div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="col col-sm-7">
                        <div class="form-group">
                            <textarea name="data" id="data" class="ckeditor form-control"
                                      placeholder="Enter content...">{!! old('data') !!}</textarea>
                            <p id="content-error" class="errors"></p>
                        </div>
                    </div>
                    <div class="col col-sm-5">
                        <div class="form-group">
                            <input type="text" class="form-control"
                                   id="title" name="title" value="{!! old('title') !!}" placeholder="Title"
                            >
                            <p id="title-error" class="errors"></p>
                        </div>
                        <div class="form-group">
                            <label for="title">Image URL:</label>
                            <input type="text" class="form-control"
                                   id="img_url" name="img_url" value="{!! old('img_url') !!}"
                                   placeholder="e.g. http://.../hello.img"
                            >
                        </div>
                        <div class="form-group">
                            <label for="tags">Choose tags</label>
                            <div class="checkbox-style row">
                                @foreach(\App\Tag::all() as $tag)
                                    <label for="tag{{$tag->id}}" class="col col-sm-4">
                                        <input id="tag{{$tag->id}}" type="checkbox" name="tags[]" value="{{$tag->id}}">
                                        {{$tag->name}}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="create_article_category_id">Category</label>
                            <select name="create_article_category_id" id="create_article_category_id" class="form-control">
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
                                    <label for="author{{$author->id}}" style="font-weight: normal" class="col col-sm-6">
                                        <input type="checkbox" id="author_{{$count}}" name="authors[]"
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
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="submit-create-article">Create article</button>
                        <input type="hidden" value="{{Session::token()}}" name="_token">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $('#title').focus();

        CKEDITOR.config.width = '700px';
        CKEDITOR.config.height = 'calc(100vh - 300px)';


        $('#submit-create-article').click(function (e) {
            e.preventDefault();
            var form = $('#create-article');

            var authors = [];
            authors.length = '{{count(\App\Author::all())}}';
            var count = 0;
            for (var i = 1; i <= authors.length; i++) {
                if($('#author_' + i).is(':checked'))
                    authors[count++] = ($('#author' + i).val())
            }
            $.ajax({
                type: 'POST',
                url: '{{route('admin.validate.article')}}',
                data: {
                    title: form.find('#title').val(),
                    data: CKEDITOR.instances['data'].getData(),
                    category_id: $('#create_article_category_id').val(),
                    authors: authors,
                    _token: '{{Session::token()}}'
                },
                beforeSend: function () {
                    $('#content-error').text('');
                    $('#title-error').text('');
                    $('#category-error').text('');
                    $('#authors-error').text('')
                },
                success: function (response) {
                    console.log(response);
                    form.find('form').submit();
                },
                error: function (response) {
                    response = JSON.parse(response.responseText);
                    $('#content-error').text(response.data);
                    $('#title-error').text(response.title);
                    $('#category-error').text(response.category_id ? 'Category is required.' : '');
                    $('#authors-error').text(response.authors)
                }
            })
        })
    </script>
@endif