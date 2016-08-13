<!-- bài đọc nhiều nhất -->
<div class="top-view">
    <div class="head-top">
        <a href="#">Related Articles</a>
    </div>
    <div class="body-top">
        <ul>
            @foreach($articles_top as $article)
                <li><a href="#">{{$article->title}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="footer-top">
        <a href="#">View all</a>
    </div>
</div>
<!-- end -->