var app = angular.module('mainApp', ['angularUtils.directives.dirPagination', 'ngSanitize'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});
function getUrlPath() {
    var path = location.pathname;
    var last = path.lastIndexOf('/') + 1;
    path = path.substring(last);
    return path;
}