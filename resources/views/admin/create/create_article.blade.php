@extends("admin.layouts.master")
@section("title","Create Article")
@section('scripts')
    <script type="text/javascript" src="{{asset('/ckeditor/ckeditor.js')}}"></script>
@endsection
@section("content")
    <div class="content wide">
        <form class="" action="{{route('post_article_1')}}" method="post" role="form">
            <div class="col col-sm-8">
                <div class="form-group">
                    <textarea name="data" id="data" class="ckeditor form-control" placeholder="Enter content...">{!! old('data') !!}</textarea>
                </div>
            </div>
            <div class="col col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control"
                           id="title" name="title" value="{!! old('title') !!}" placeholder="Title"
                    >
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
                        @foreach($tags as $tag)
                            <label for="tag{{$tag->id}}" class="col col-sm-6">
                                <input id="tag{{$tag->id}}" type="checkbox" name="tags[]" value="{{$tag->id}}">
                                {{$tag->name}}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="null" style="font-weight: bold">--Select a category--</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="authors">Choose Author(s)</label>
                    <div class="checkbox-style row">
                        @foreach($authors as $author)
                            <label for="author{{$author->id}}" style="font-weight: normal" class="col col-sm-6">
                                <input type="checkbox" id="author{{$author->id}}" name="authors[]"
                                       value="{{$author->id}}">
                                {{$author->user->name}}
                            </label>
                        @endforeach
                    </div>
                </div>
                @if(count($errors)>0)
                    <ul class="errors">
                        @foreach($errors->all() as $error)
                            <li>* {{$error == 'The category id must be a number.'?'The category is required .':$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Create article</button>
                    <input type="hidden" value="{{Session::token()}}" name="_token">
                </div>
            </div>
        </form>
    </div>
    <script>
        $('#title').focus();
        CKEDITOR.config.height = 'calc(100vh - 300px)';
    </script>
@endsection