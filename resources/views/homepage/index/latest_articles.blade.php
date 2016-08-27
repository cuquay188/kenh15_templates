<div class="newest-article">
    @foreach($article_first as $article)
        <div class="picture">
            <a href="{{route('homepage').'/article/'.$article->id}}">
                <img src="{{$article->img_url}}" style="width:100%;height: 100%">
            </a>
        </div>
        <div class="title">
            <a href="{{route('homepage').'/article/'.$article->id}}">{{$article->title}}</a>
        </div>
        <div class="content">
            <p>
                <?php
                echo $article->shorten_content(300)
                ?>
            </p>
        </div>
    @endforeach
</div>
<div class="latest-articles">
    @foreach($articles_latest as $article)
        <div class="article">
            <div class="picture">
                <a href="{{route('homepage').'/article/'.$article->id}}"><img
                            src="{{$article->img_url}}"></a>
            </div>
            <div class="title">
                <a href="{{route('homepage').'/article/'.$article->id}}">{{$article->title}}</a>
            </div>
        </div>
    @endforeach
</div>