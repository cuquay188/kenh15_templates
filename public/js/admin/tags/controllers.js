app.controller('tagsListController', function ($rootScope, $scope, $http, $log, $tags) {
    $scope.$watch(function () {
        return $tags.get()
    }, function (newVal) {
        $scope.tags = newVal;
    });
    $rootScope.sortType = 'articles';
    $rootScope.sortReverse = false;
});

app.controller('tagController', function ($scope, $log, $tag) {
    $scope.edit = function () {
        $tag.set($scope.tag);
    };
    $scope.delete = function () {
        $tag.set($scope.tag);
    }
});

app.controller('editTagController', function ($scope, $http, $tag) {
    $scope.$watch(function () {
        return $tag.get()
    }, function (newVal) {
        $scope.tag = newVal;
        if ($scope.tag)
            $scope.tag.newName = $scope.tag.name;
    });
    $scope.dismiss = function () {
        $tag.set(null);
        $scope.nameErrors = '';
    };
    $scope.submit = function () {
        $tag.update($scope, $http, $scope.tag.newName)
    };
    modalEvent($scope,'edit-tag')
});

app.controller('deleteTagController', function ($scope, $http, $tags, $tag) {
    $scope.$watch(function () {
        return $tag.get()
    }, function (newVal) {
        $scope.tag = newVal;
    });
    $scope.dismiss = function () {
        $tag.set(null);
    };
    $scope.submit = function () {
        $tag.remove($scope, $http, $tags)
    };
    modalEvent($scope,'delete-tag')
});

app.controller('createTagController', function ($scope, $http, $tags, $tag) {
    $scope.submit = function (more) {
        $tag.create($scope, $http, $tags, $scope.newName, more);
    };
    modalEvent($scope,'create-tag',1)
});