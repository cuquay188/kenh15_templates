@extends('admin.layouts.master')
@section('title')
    {{$category->name}}
@endsection
@section('content')
    <div class="content">
        <div class="articles-list">
            @if(count($articles))
                <label>The article(s) related to this category:</label>
                <ul>
                    @foreach($articles as $article)
                        <li>
                            <a href="{{route('article').'/'.$article->url}}">{{$article->title}}</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="empty-message">
                    No articles is available for this category.
                    <a href="#" data-toggle="modal"
                       data-target="#create-article">Create a new one</a>.
                </div>
            @endif
        </div>
        <?php echo $articles->render(); ?>
    </div>
@endsection