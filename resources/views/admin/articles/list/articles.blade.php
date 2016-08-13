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
                        @include("admin.articles.list.components.authors")
                    </td>
                    <td id="tags">
                        @include("admin.articles.list.components.tags")
                    </td>
                    <td>
                        {{--Preview--}}
                        <a href="{{route('article').'/'.$article->id}}" class="btn btn-primary btn-xs">Preview</a>
                        {{--Edit--}}
                        <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#edit{{$article->id}}" style="text-align: center">Edit
                        </button>
                        @include("admin.articles.list.components.edit")
                        {{--Delete--}}
                        <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#delete{{$article->id}}" style="text-align: center">Delete
                        </button>
                        @include("admin.articles.list.components.delete")
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