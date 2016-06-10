@extends("layouts.master")
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
        <form action="{{route('post_article')}}" method="post" role="form">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title..."
                       style="width: 150%">
            </div>
            <div class="form-group">
                <label for="data">Content</label>
                <textarea name="data" id="data" cols="30" rows="20" class="form-control" placeholder="Enter content..."
                          style="width: 200%"></textarea>
            </div>
            <div class="form-group">
                <label for="tags">Choose tags</label>
                <div class="checkbox-tags row">
                    @foreach($tags as $tag)
                        <label style="font-weight: normal" for="tag{{$tag->id}}" class="col col-sm-2">
                            <input id="tag{{$tag->id}}" type="checkbox"  name="tags[]" value="{{$tag->id}}"> {{$tag->name}}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" style="width: 50%">
                    <option value="0" style="font-weight: bold">--Select a category--</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="author_id">Author</label>
                <select name="author_id" id="author_id" class="form-control" style="width: 50%">
                    <option value="0" style="font-weight: bold">--Select an author--</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Create</button>
                <input type="hidden" value="{{Session::token()}}" name="_token">
            </div>
        </form>
    </div>
@endsection