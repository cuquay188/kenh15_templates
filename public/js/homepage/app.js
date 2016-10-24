var app = angular.module('mainApp', ['angularUtils.directives.dirPagination', 'ngSanitize', 'ngRoute'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
}).controller('mainController', function ($rootScope) {
    $rootScope.$on('$routeChangeStart', function () {
        console.log('$routeChangeStart')
    });
    $rootScope.$on('$routeChangeSuccess', function () {
        console.log('$routeChangeSuccess');
        $('.body').scrollTop(0);
    });
    $rootScope.$on('$routeChangeError', function () {
        console.log('$routeChangeError')
    });
}).filter('parseUrl', function () {
    return function (object, type) {
        if (!object) {
            return '#home'
        }
        var str = object.url;
        switch (type) {
            case 'article':
                str = '#article/' + str;
                break;
            case 'category':
                str = '#category/' + str;
                break;
            case 'tag':
                str = '#tag/' + str;
                break;
            default:
                str = '#home'
        }
        return str;
    }
});
function getUrlPath() {
    var path = location.hash;
    var last = path.lastIndexOf('/') + 1;
    path = path.substring(last);
    return path;
}
function setListHotHeight() {
    $('.list-hot').css({
        'height': $('.newest-article').height() - $('.hot-day .title').height()
    });
}