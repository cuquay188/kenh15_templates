<div class="top-view">
    <div class="head-top">
        <a href="#">Related Articles</a>
    </div>
    <div class="body-top">
        <ul>
            <?php
            $related_filter = array();
            $count_article = 0;
            for ($i = 0; $i < count($related_articles);) {
                if ($article->id != $related_articles[$i]->id) {
                    $count_article++;
                    if ($count_article <= 5)
                        array_push($related_filter, $related_articles[$i]);
                    $i++;
                } else $i++;
            }
            ?>
            @foreach($related_filter as $related_article)
                <li>
                    <a href="{{route('homepage').'/article/'.$related_article->url}}">{{$related_article->shorten_title(120)}}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="footer-top">
        <a href="#">View all</a>
    </div>
</div>