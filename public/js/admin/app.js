
var app = angular.module("mainApp",['angularUtils.directives.dirPagination'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
});