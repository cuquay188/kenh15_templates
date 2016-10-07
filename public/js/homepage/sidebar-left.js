var $sidebar = $('.sidebar-left');
var mainContentOffset = $sidebar.width() + parseInt($sidebar.css('padding-right')) * 2;
var bodyTopHeight = $('.body-top').height();
$sidebar.css({
    'position': 'absolute',
    'top': $('.content-area').css('margin-top'),
    'width': mainContentOffset
});
$('.main-content').css({
    'margin-left': mainContentOffset
});
$('.body').scroll(function () {
    var topOffset = parseInt($('.content-area').css('margin-top')) + $(this).scrollTop();
    $sidebar.css('top', topOffset);
    var offset = $('.main-content').height() - $(this).height();
    /*console.log(offset + ' ' + $(this).scrollTop());*/
    if ($(this).scrollTop() > offset) {
        //if ($sidebar.height() > 429) {
            $('.body-top').height(bodyTopHeight/2);
        //}
    }else{
        $('.body-top').height(bodyTopHeight)
    }
});