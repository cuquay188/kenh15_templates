var $sidebar = $('.sidebar-left');
var mainContentOffset = $sidebar.width() + parseInt($sidebar.css('padding-right')) * 2;
$sidebar.css({
    'position': 'absolute',
    'top': 0,
    'width': mainContentOffset
});
$('.main-content').css({
    'margin-left': mainContentOffset
});
$('.body').scroll(function () {
    $sidebar.css('top', $(this).scrollTop());
});