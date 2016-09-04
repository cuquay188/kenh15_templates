
app.controller('sidebarController', function ($scope, $http, $articles, $authors, $tags, $categories) {

    $scope.$watch(function () {
        return $articles.size()
    }, function (newVal) {
        $scope.articleLength = newVal
    });

    $scope.$watch(function () {
        return $authors.size()
    }, function (newVal) {
        $scope.authorLength = newVal
    });
    $scope.$watch(function () {
        return $tags.size()
    }, function (newVal) {
        $scope.tagLength = newVal
    });
    $scope.$watch(function () {
        return $categories.sizeOf.categories()
    }, function (newVal) {
        $scope.categoryLength = newVal
    });
});