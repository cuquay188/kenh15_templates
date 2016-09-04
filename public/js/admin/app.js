var app = angular.module("mainApp", ['angularUtils.directives.dirPagination'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
});


app.controller('mainController', function ($scope, $http, $articles, $authors, $tags, $categories) {

    $articles.load($http);
    $authors.load($http);
    $tags.load($http);
    $categories.load($http);

    $scope.$watchGroup([
        function () {
            return $authors.get();
        },
        function () {
            return $tags.get();
        },
        function () {
            return $categories.get();
        }
    ], function () {
        $scope.itemsPerPage = {
            items: [
                parseInt(numberOfItem() / 2),
                numberOfItem(),
                numberOfItem() * 2,
                numberOfItem() * 4
            ],
            item: numberOfItem()
        };
    })

});

var numberOfItem = function () {
    var items,
        $body = $('.body .container'),
        $table = $body.find('.table'),
        bodyHeight = $body.height(),
        trHeight = $table.find('tbody').find('tr').height(),
        dirPaginateHeight = $body.find('.row').height() + 40;
    items = (bodyHeight - dirPaginateHeight) / trHeight - 1;
    return parseInt(items);
};

var find = function (array, x) {
    var index = -1;
    $.each(array, function (i, val) {
        if (val.id == x) {
            index = i;
            return false;
        }
    });
    return index;
};
$('#create-tag, #edit-tag, #create-category, #edit-category').on('shown.bs.modal', function () {
    $(this).find('#name').focus();
});

CKEDITOR.config.width = '55vw';
CKEDITOR.config.height = 'calc(100vh - 300px)';

var modalEvent = function ($scope, modal, more) {
    $('#' + modal).on("shown.bs.modal", function () {
        $(document).on("keyup", function (e) {
            if (e.keyCode == 13)
                $scope.submit(more);
            if (e.keyCode == 27) {
                if ($scope.dismiss)
                    $scope.dismiss();
                $('#' + modal).modal('hide')
            }
        })
    }).on("hidden.bs.modal", function () {
        $(document).off("keyup");
    });
};
$('#create-category, #create-tag, #create-author')
    .find('.modal-content').draggable()
    .find('.modal-header').css('cursor', 'pointer');


$('#birth').datepicker({
    dateFormat: "dd/mm/yy",
    minDate: new Date('1950'),
    maxDate: new Date('2020')
}).datepicker($.datepicker.regional["vi"]);


app.filter('date', function () {
    return function (x) {
        return x.getFullYear() + '/' + x.getMonth() + '/' + x.getDay();
    }
}).filter('time', function () {
    return function (x) {
        return x.getHours() + ':' + x.getMinutes() + ':' + x.getSeconds()
    }
});