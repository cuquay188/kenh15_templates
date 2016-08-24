<div class="newest-article">
    <div class="picture">
        <a href="{{route('homepage').'/article/'.$article_first->id}}">
            <img src="{{$article_first->img_url}}" style="width:100%;height: 100%">
        </a>
    </div>
    <div class="title">
        <a href="{{route('homepage').'/article/'.$article_first->id}}">{{$article_first->title}}</a>
    </div>
    <div class="content">
        <p>
            <?php
            echo $article_first->shorten_content(300)
            ?>
        </p>
    </div>
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