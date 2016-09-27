var numberOfItem = function() {
    var items,
        $body = $('.body .container'),
        $table = $body.find('.table'),
        bodyHeight = $body.height(),
        trHeight = $table.find('tbody').find('tr').height(),
        dirPaginateHeight = $body.find('.row').height() + 40;
    items = (bodyHeight - dirPaginateHeight) / trHeight - 1;
    return parseInt(items);
};
var find = function(array, x) {
    var index = -1;
    $.each(array, function(i, val) {
        if (val.id == x) {
            index = i;
            return false;
        }
    });
    return index;
};
$('#create-tag, #update-tag, #create-category, #update-category').on('shown.bs.modal', function() {
    $(this).find('#name').focus();
});
CKEDITOR.config.width = '55vw';
CKEDITOR.config.height = 'calc(100vh - 300px)';
var modalEvent = function($scope, modal, more) {
    $('#' + modal).on("shown.bs.modal", function() {
        $(document).on("keyup", function(e) {
            if (e.keyCode == 13) $scope.submit(more);
            if (e.keyCode == 27) {
                if ($scope.dismiss) $scope.dismiss();
                $('#' + modal).modal('hide')
            }
        })
    }).on("hidden.bs.modal", function() {
        $(document).off("keyup");
    });
};
$('#create-category, #create-tag, #create-author').find('.modal-content').draggable().find('.modal-header').css('cursor', 'pointer');
var toggleLoading = function(show, target = '#loading-toggle') {
    $(target).css('display', (show ? 'block' : 'none'));
    if (show) $('.container.ng-scope').hide();
};
$.notify.defaults({
    showAnimation: 'slideDown',
    showDuration: 300,
    hideAnimation: 'slideUp',
    hideDuration: 200,
    autoHideDelay: 4000,
});
$.notify.addStyle('app', {
    html: "<div><i data-notify-text/></div>",
});
var notify = function(text = 'Unknown message.', style = 'primary') {
    var options = {
        'style': 'app',
        'className': style,
    }
    if (style == 'warning') options.autoHideDelay = delayToRefresh;
    $.notify(text, options);
};
var delayToRefresh = 5000,
    errorStatus = 500;