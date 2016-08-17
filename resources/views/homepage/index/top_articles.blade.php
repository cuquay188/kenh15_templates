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
<script>
    $(function () {
        var offsetPixels = 55;
        $('.body').scroll(function () {
            if ($('.body').scrollTop() > offsetPixels) {
                $('.sidebar-left').css({
                    'position': 'fixed',
                    'top': '55px',
                    'width':'285px'
                });
                $('.main-content').css({
                    'position':'relative',
                    'left':'285px'
                })
            }else{
                $('.sidebar-left').css({
                    'position': 'static'
                });
                $('.main-content').css({
                    'position':'static'
                })
            }
        })
    })
</script>
<!-- end -->