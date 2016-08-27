app.controller('sidebarController', function ($scope, $http, $tags) {
    $tags.load($http);

    $scope.$watch(function () {
        return $tags.size()
    }, function (newVal) {
        $scope.tagLength = newVal
    });
});