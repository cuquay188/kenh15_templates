
app.controller('sidebarController', function ($scope, $http, $authors, $tags, $categories) {

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
    $scope.$watch(function () {
        return $categories.sizeOf.is_header()
    }, function (newVal, oldVal) {
        if (newVal > oldVal && newVal > 5)
            alert('You should not place more than 5 category to header.')
    })
});