<!-- bài đọc nhiều nhất -->
<div class="top-view">
    <div class="head-top">
        <a href="#">Top Articles</a>
    </div>
    <div class="body-top">
        <ul>
            @foreach($articles_top as $article)
                <li><a href="{{route('homepage').'/article/'.$article->id}}">{{$article->shorten_title(120)}}</a></li>
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
        console.log(bodySidebarHeight / 2);
        $('.body').scroll(function () {
            if ($('.body').scrollTop() > offsetPixels) {
                $('.sidebar-left').css({
                    'position': 'fixed',
                    'top': '60px',
                    'width': '292.5px'
                });
                $('.main-content').css({
                    'position': 'relative',
                    'left': '292.5px'
                });
                if ($('.body').scrollTop() > offsetStopPixels) {
                    $('.body-top').css({
                        'height': bodySidebarHeight / 2,
                        'overflow-y': 'auto'
                    });
                    $('.main-content').css({
                        'position': 'relative',
                        'left': '292.5px'
                    });
                } else {
                    $('.body-top').css({
                        'height': bodySidebarHeight + 10
                    });
                }
            } else {
                $('.sidebar-left').css({
                    'position': 'static'
                });
                $('.main-content').css({
                    'position': 'static'
                })
            }
        })
    })
</script>
<!-- end -->