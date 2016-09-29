var app = angular.module("mainApp", ['angularUtils.directives.dirPagination', 'ngSanitize', 'ngRoute'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
});
app.config(function(paginationTemplateProvider) {
    paginationTemplateProvider.setPath(url.plugin.dirPagination.controllerHtmlPath);
});
app.controller('mainController', function($rootScope, $scope, $http, $auth, $articles, $authors, $tags, $categories, $auth, appFactory) {
    $rootScope.$on('$routeChangeStart', function() {
        toggleLoading(true);
    });
    $rootScope.$on('$routeChangeSuccess', function(e, current, pre) {
        toggleLoading(false);
        $scope.hashPath = current.$$route.originalPath.substring(1);
        appFactory.notify('Loading ' + $scope.hashPath + ' successful.', 'success');
    });
    $rootScope.$on('$routeChangeError', function() {
        toggleLoading(false);
        appFactory.notify('Loading has failed.', 'danger');
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
    $rootScope.$watch(function() {
        return $auth.get()
    }, function(user) {
        $rootScope.auth = user;
    });
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
app.constant('delayToRefresh', 5000).constant('errorStatus', 500);
app.factory('appFactory', function($window, $timeout, delayToRefresh, errorStatus) {
    var factory = {};
        /**
         * [errorPage description]
         * @param  {[type]}   response the response return from api
         * @param  {Function} callback run script if the response status is not 500
         */
    factory.errorPage = function(response, callback) {
        if (response.status == errorStatus) {
            factory.notify('Unknown problem. The page will automatically refresh after ' + delayToRefresh / 1000 + ' seconds or you can press F5 to quick refresh.', 'warning')
            $timeout(function() {
                $window.location.reload();
            }, delayToRefresh);
        } else {
            callback;
        }
    };
    factory.notify = function(text = 'Unknown message.', style = 'primary') {
        var options = {
            'style': 'app',
            'className': style,
        }
        if (style == 'warning') options.autoHideDelay = delayToRefresh - 500;
        $.notify(text, options);
    };
    return factory;
})