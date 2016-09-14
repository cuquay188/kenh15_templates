var app = angular.module("mainApp", ['angularUtils.directives.dirPagination', 'ngSanitize', 'ngRoute'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
});

app.config(function(paginationTemplateProvider) {
    paginationTemplateProvider.setPath(url.plugin.dirPagination.controllerHtmlPath);
});
app.controller('mainController', function($rootScope, $scope, $http, $auth, $articles, $authors, $tags, $categories) {
    $rootScope.$on('$routeChangeStart', function () {
        toggleLoading(true);
    });
    $rootScope.$on('$routeChangeSuccess', function () {
        toggleLoading(false);
    });
    $rootScope.$on('$routeChangeError', function () {
        toggleLoading(false);
    });

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