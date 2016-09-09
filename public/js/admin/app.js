var app = angular.module("mainApp", ['angularUtils.directives.dirPagination', 'ngSanitize', 'ngRoute'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
});
app.config(function(paginationTemplateProvider) {
    paginationTemplateProvider.setPath(url.plugin.dirPagination.controllerHtmlPath);
});
app.controller('mainController', function($scope, $http, $auth, $articles, $authors, $tags, $categories) {
    $auth.load($http);
    $articles.load($http);
    $authors.load($http);
    $tags.load($http);
    $categories.load($http);
    $scope.itemsPerPage = {
        items: [
            7, 14, 30, 60
        ],
        item: $('.body').height() > 900 ? 14 : 7
    };
});
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