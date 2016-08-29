app.controller('authorsListController', function ($scope, $http, $log, $authors) {
    $scope.$watch(function () {
        return $authors.get()
    }, function (newVal) {
        $scope.authors = newVal;
    });
    $scope.sortType = 'name';
    $scope.sortReverse = 1;
});

app.controller('authorController', function ($scope, $log, $author) {
    $scope.edit = function () {
        $author.set($scope.author);
    };
    $scope.delete = function () {
        $author.set($scope.author);
    }
});

app.controller('editAuthorController', function ($scope, $http, $author) {
    $scope.$watch(function () {
        return $author.get()
    }, function (newVal) {
        $scope.author = newVal;
        if ($scope.author && $scope.author)
            $scope.author = {
                name: $scope.author.name,
                newName: $scope.author.name,
                newAddress: $scope.author.address,
                newCity: $scope.author.city,
                newBirth: new Date($scope.author.birth),
                newTel: $scope.author.tel,
                newEmail: $scope.author.email
            }
    });
    $scope.dismiss = function () {
        $author.set(null);
        $scope.nameErrors = '';
    };
    $scope.submit = function () {
        $author.update($scope, $http, {
            newName: $scope.author.newName,
            newAddress: $scope.author.newAddress,
            newCity: $scope.author.newCity,
            newBirth: $scope.author.newBirth,
            newTel: $scope.author.newTel,
            newEmail: $scope.author.newEmail
        })
    };
    modalEvent($scope,'edit-author')
});

app.controller('deleteAuthorController', function ($scope, $http, $authors, $author, $normalUsers) {
    $scope.$watch(function () {
        return $author.get()
    }, function (newVal) {
        $scope.author = newVal;
    });

    $scope.dismiss = function () {
        $author.set(null);
    };
    $scope.submit = function () {
        $author.remove($scope, $http, $authors, $normalUsers)
    };

    modalEvent($scope,'delete-author')

});

app.controller('createAuthorController', function ($scope, $http, $authors, $author, $normalUsers) {
    $scope.$watch(function () {
        return $normalUsers.get()
    }, function (newVal) {
        $scope.users = newVal;
        $scope.user = $normalUsers.get(0);
    });

    $normalUsers.load($http);

    $scope.submit = function (more) {
        $author.create($scope, $http, $authors, $normalUsers, $scope.user, more);
    };
    $scope.dismiss = function () {
        $scope.userError = '';
    };

    modalEvent($scope,'create-author', 1)
});