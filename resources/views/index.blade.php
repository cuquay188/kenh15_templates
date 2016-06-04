@extends("layouts.master")
@section("title")
    Index
@endsection
@section("content")
    <div class="article-add">
        <form action="{{route('create_article')}}" method="get">
            <button type="submit" class="btn btn-primary" style="float: right;margin-bottom: 30px">Add</button>
            <input type="hidden" value="{{Session::token()}}" name="_token">
        </form>
    </div>
    <div class="article-list">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Function</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr style="font-size: 13px">
                    <td>{{$article->id}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->category->name}}</td>
                    <td>{{$article->created_at}}</td>
                    <td>{{$article->updated_at}}</td>
                    <td>
                        <button type="submit" class="btn btn-primary btn-xs">Edit</button>
                        <button type="submit" class="btn btn-primary btn-xs">Delete</button>
                        <button type="submit" class="btn btn-primary btn-xs">Detail</button>
                        <input type="hidden" value="{{Session::token()}}" name="_token">
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection