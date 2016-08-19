@extends("admin.layouts.master")
@section("title",'Articles Management')
@section('scripts')
    <script type="text/javascript" src="{{asset('/ckeditor/ckeditor.js')}}"></script>
@endsection
@section("content")
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
                <th style="text-align: center;">Title</th>
                <th>Category</th>
                <th style="text-align: center;">Last Update</th>
                <th style="">Author</th>
                <th style="">Tags</th>
                <th style="width:175px;">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(count($articles))
            @foreach($articles as $article)
                <tr style="font-size: 13px">
                    <td id="title"><a href="{{route('article').'/'.$article->url}}">{{$article->shorten_title(50)}}</a>
                    </td>
                    <td id="category"><a
                                href="{{route('category').'/'.$article->category->id}}">{{$article->category->name}}</a>
                    </td>
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
                        <button type="submit" {{Auth::getUser()->author||Auth::getUser()->admin ? '' : 'disabled'}}
                        class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#edit{{$article->id}}" style="text-align: center">Edit
                        </button>
                        @include("admin.articles.list.components.edit")
                        {{--Delete--}}
                        <button type="submit" {{Auth::getUser()->author||Auth::getUser()->admin ? '' : 'disabled'}}
                        class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#delete{{$article->id}}" style="text-align: center">Delete
                        </button>
                        @include("admin.articles.list.components.delete")
                    </td>
                </tr>
            @endforeach
            @section('body.scripts')
                <script>
                    $('table').DataTable();
                </script>
            @endsection
            @else
                <tr>
                    <td colspan="6" class="empty-table">
                        No articles is available.
                        <a href="{{route('create_article')}}">Create a new one</a>.
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection