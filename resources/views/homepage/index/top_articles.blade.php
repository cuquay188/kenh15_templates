<!-- bài đọc nhiều nhất -->
<div class="top-view">
    <div class="head-top">
        <a href="#">Top Articles</a>
    </div>
    <div class="body-top">
        <ul data-spy="affix" data-offset-top="200">
            @foreach($articles_top as $article)
                <li><a href="{{route('homepage').'/article/'.$article->id}}">{{$article->title}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="footer-top">
        <a href="#">View all</a>
    </div>
</div>
<!-- end -->