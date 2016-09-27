var app = angular.module("mainApp", ['angularUtils.directives.dirPagination', 'ngSanitize', 'ngRoute'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
});
app.config(function(paginationTemplateProvider) {
    paginationTemplateProvider.setPath(url.plugin.dirPagination.controllerHtmlPath);
});
app.controller('mainController', function($rootScope, $scope, $http, $auth, $articles, $authors, $tags, $categories) {
    $rootScope.$on('$routeChangeStart', function() {
        toggleLoading(true);
    });
    $rootScope.$on('$routeChangeSuccess', function(e, current, pre) {
        toggleLoading(false);
        $scope.hashPath = current.$$route.originalPath.substring(1);
        notify('Loading ' + $scope.hashPath + ' successful.', 'success');
    });
    $rootScope.$on('$routeChangeError', function() {
        toggleLoading(false);
        notify('Loading has failed.', 'danger');
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
app.directive('thSortable', function($rootScope) {
    return {
        templateUrl: 'th-sortable-directive',
        scope: {},
        link: function(scope, el, attrs) {
            scope.sortBy = attrs.sortBy;
            scope.sortReverse = true;
            scope.title = attrs.title;
            scope.width = attrs.width;
            scope.$watchGroup(['type', 'reverse'], function(sort) {
                $rootScope.sortType = sort[0];
                $rootScope.sortReverse = sort[1];
            });
            $rootScope.$watch('sortType', function(sort) {
                scope.type = sort;
            });
            $rootScope.$watch('sortReverse', function(sort) {
                scope.reverse = sort;
            });
        }
    }
});