<div class="top-view">
    <div class="head-top">
        <a href="#">Related Articles</a>
    </div>
    <div class="body-top" data-spy="affix" data-offset-top="10" data-offset-bottom="200">
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
                    <a href="{{route('homepage').'/article/'.$related_article->id}}">{{$related_article->shorten_title(120)}}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="footer-top">
        <a href="#">View all</a>
    </div>
</div>
<script>
    $(function () {
        var offsetPixels = 0;
        var offsetStopPixels = $('.body .container').height() - $('footer').height() - 500;
        var bodySidebarHeight = $('.body-top').height();
        $('.body').scroll(function () {
            if ($('.body').scrollTop() > offsetPixels) {
                $('.sidebar-left').css({
                    'position': 'fixed',
                    'top': '60px',
                    'width': '292.5px'
                });
                $('.main-content, .advertisement').css({
                    'position': 'relative',
                    'left': '292.5px'
                });
                if ($('.body').scrollTop() > offsetStopPixels) {
                    $('.body-top').css({
                        'height': bodySidebarHeight / 2,
                        'overflow-y': 'auto'
                    });
                    $('.main-content, .advertisement').css({
                        'position': 'relative',
                        'left': '292.5px'
                    });
                } else {
                    $('.body-top').css({
                        'height': bodySidebarHeight + 60
                    });
                }
            } else {
                $('.sidebar-left').css({
                    'position': 'static'
                });
                $('.main-content, .advertisement').css({
                    'position': 'static'
                });
            }
        })
    })
</script>