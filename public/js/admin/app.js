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
    items = (bodyHeight - dirPaginateHeight) / trHeight -2;
    return parseInt(items);
};

app.controller('mainController', function ($scope, $http, $authors, $tags, $categories) {
    $authors.load($http);
    $tags.load($http);
    $categories.load($http);

    $scope.itemsPerPage = {
        items: [
            parseInt(numberOfItem()/2),
            numberOfItem(),
            numberOfItem()*2,
            numberOfItem()*4
        ],
        item: numberOfItem()
    };
});
