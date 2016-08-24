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
        var offsetStopPixels = $('.body').height() - $('footer').height() - 150;
        var bodySidebarHeight = $('.body-top').height();
        $('.body').scroll(function () {
            if ($('.body').scrollTop() > offsetPixels) {
                $('.sidebar-left').css({
                    'position': 'fixed',
                    'top': '55px',
                    'width': '285px'
                });
                $('.main-content').css({
                    'position': 'relative',
                    'left': '285px'
                });
                if ($('.body').scrollTop() > offsetStopPixels) {
                    $('.body-top').css({
                        'height': 290,
                        'overflow-y': 'auto'
                    });
                    $('.main-content').css({
                        'position': 'relative',
                        'left': '285px'
                    });
                }else {
                    $('.body-top').css({
                        'height': bodySidebarHeight + 32.5
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