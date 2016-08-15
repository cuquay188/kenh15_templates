<!-- bài đọc nhiều nhất -->
<div class="top-view">
    <div class="head-top">
        <a href="#">Related Articles</a>
    </div>
    <div class="body-top">
        <ul>
            @foreach($related_articles as $related_article)
                @if($article->id != $related_article->id)
                    <li><a href="{{route('homepage').'/article/'.$related_article->id}}">{{$related_article->title}}</a></li>
                @endif
            @endforeach
        </ul>
    </div>
    <div class="footer-top">
        <a href="#">View all</a>
    </div>
</div>
<!-- end -->