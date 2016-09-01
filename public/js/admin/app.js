var app = angular.module("mainApp", ['angularUtils.directives.dirPagination'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
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

app.filter('date', function () {
    return function (x) {
        return x.getFullYear() + '/' + x.getMonth() + '/' + x.getDay();
    }
}).filter('time', function () {
    return function (x) {
        return x.getHours() + ':' + x.getMinutes() + ':' + x.getSeconds()
    }
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
