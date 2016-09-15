var sidebarLeftWidth = $('.sidebar-left').width() + (parseInt($('.sidebar-left').css('padding-left')) * 2) - 2;
var contentHeight = $('.content-area .container').height() - $('footer .container').height() * 8;
var bodyTopHeight = $('.body-top').height();
$('.sidebar-left').css({
    'position': 'fixed',
    'top': '50px',
    'width': sidebarLeftWidth
});
$('.main-content').css({
    'position': 'relative',
    'left': sidebarLeftWidth
});

$('.body').scroll(function () {
    if ($('.body').scrollTop() > contentHeight) {
        $('.body-top').css({
            'height': bodyTopHeight / 1.333
        });
    } else {
        $('.body-top').css({
            'height': bodyTopHeight + 5
        });
        console.log(bodyTopHeight)
    }
});