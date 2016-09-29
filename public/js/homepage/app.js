var app = angular.module('mainApp', ['angularUtils.directives.dirPagination'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});
function getCategoryIdPath() {
    var path = location.pathname;
    var last = path.lastIndexOf('/') + 1;
    path = path.substring(last);
    return path;
}