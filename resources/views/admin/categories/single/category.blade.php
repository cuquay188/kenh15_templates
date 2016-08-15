@extends('admin.layouts.master')
@section('title')
    {{$category->name}}
@endsection
@section('content')
    <div class="content">
        <div class="title">
            <p class="view-title">Category: {{$category->name}}</p>
        </div>
        <div class="articles-list">
            <label>The article(s) related to this category:</label>
            <ul>
                @foreach($articles as $article)
                    <li>
                        <a href="{{route('article').'/'.$article->id}}">{{$article->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <?php echo $articles->render(); ?>
    </div>
@endsection