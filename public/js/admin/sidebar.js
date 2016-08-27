app.controller('sidebarController', function ($scope, $http, $tags) {
    $scope.$watch(function () {
        return $tags.size()
    }, function (newVal) {
        if(newVal==null){
            $http.get(url.tag.length)
                .then(function (response) {
                    $scope.tagLength = response.data.length;
                })
        }
        $scope.tagLength = newVal
    });
});