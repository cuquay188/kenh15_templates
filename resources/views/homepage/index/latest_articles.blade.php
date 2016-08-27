<div class="newest-article">
    @foreach($article_first as $article)
        <div class="picture" style="background-image: url('{{$article->img_url}}')">
            <div class="backdrop">
                <a href="{{route('homepage').'/article/'.$article->id}}">
                    <img src="{{$article->img_url}}" style="max-height: 200px;max-width: 300px">
                </a>
            </div>
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
            <div class="picture" style="background-image: url('{{$article->img_url}}')">
                <div class="backdrop">
                    <a href="{{route('homepage').'/article/'.$article->id}}">
                        <img src="{{$article->img_url}}">
                    </a>
                </div>
            </div>
            <div class="title">
                <a href="{{route('homepage').'/article/'.$article->id}}">{{$article->title}}</a>
            </div>
        </div>
    @endforeach
</div>