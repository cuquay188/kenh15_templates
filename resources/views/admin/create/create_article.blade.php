@extends("admin.layouts.master")
@section("title")
    Kenh 15
@endsection
@section("styles")
    <link rel="stylesheet" href="{{asset("/css/main.css")}}">
@endsection
@section("content")
    <div class="back">
        <form action="{{route('article')}}" method="get">
            <button style="float: right;margin-bottom: 30px" type="submit" class="btn btn-danger">Back</button>
        </form>
    </div>
    <div class="content">
        @if(count($errors)>0)
            <ul class="errors">
                @foreach($errors->all() as $error)
                    <li>* {{$error == 'The category id must be a number.'?'The category is required .':$error}}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{route('post_article_1')}}" method="post" role="form">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control"
                       id="title" name="title" value="{!! old('title') !!}" placeholder="Enter title..."
                      >
            </div>
            <div class="form-group">
                <label for="data">Content</label>
                <textarea name="data" id="data" class="ckeditor form-control" placeholder="Enter content..."
                          style="width: 200%">{!! old('data') !!}</textarea>
            </div>
            <div class="form-group">
                <label for="tags">Choose tags</label>
                <div class="checkbox-style row">
                    @foreach($tags as $tag)
                        <label for="tag{{$tag->id}}" class="col col-sm-3">
                            <input id="tag{{$tag->id}}" type="checkbox" name="tags[]" value="{{$tag->id}}">
                            {{$tag->name}}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" style="width: 30%">
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
                        <label for="author{{$author->id}}" style="font-weight: normal" class="col col-sm-4">
                            <input type="checkbox" id="author{{$author->id}}" name="authors[]" value="{{$author->id}}">
                            {{$author->name}}
                        </label>
                    @endforeach
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Create</button>
                <input type="hidden" value="{{Session::token()}}" name="_token">
            </div>
        </form>
    </div>
    <script>
        $('#title').focus();
//        CKEDITOR.replace( 'data' );
    </script>
@endsection