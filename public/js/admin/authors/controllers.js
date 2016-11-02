app.controller('authorsListController', function($rootScope, $scope, $authors) {
    $scope.$watch(function() {
        return $authors.get()
    }, function(newVal) {
        $scope.authors = newVal;
    });
    $rootScope.sortType = 'name';
    $rootScope.sortReverse = false;
});
app.controller('authorController', function($scope, $author) {
    $scope.edit = function() {
        $author.set($scope.author);
    };
    $scope.delete = function() {
        $author.set($scope.author);
    }
});
app.controller('editAuthorController', function($scope, $author, $auth) {
    $scope.$watch(function() {
        return $author.get()
    }, function(newVal) {
        $scope.author = newVal;
        if ($scope.author) {
            $scope.author = {
                name: $scope.author.name,
                newName: $scope.author.name,
                newAddress: $scope.author.address,
                newCity: $scope.author.city,
                newTel: $scope.author.tel
            };
            $('#birth').datepicker("setDate", new Date(moment(newVal.birth)))
        }
    });
    $scope.dismiss = function() {
        $author.set(null);
        $scope.nameErrors = '';
    };
    $scope.submit = function() {
        $author.update($scope, $auth, {
            newName: $scope.author.newName,
            newAddress: $scope.author.newAddress,
            newCity: $scope.author.newCity,
            newBirth: moment($('#birth').datepicker("getDate")).format('YYYY-MM-DD'),
            newTel: $scope.author.newTel
        })
    };
});
app.controller('deleteAuthorController', function($scope, $authors, $author, $normalUsers) {
    $scope.$watch(function() {
        return $author.get()
    }, function(newVal) {
        $scope.author = newVal;
    });
    $scope.dismiss = function() {
        $author.set(null);
    };
    $scope.submit = function() {
        $author.remove($scope, $authors, $normalUsers)
    };
    modalEvent($scope, 'delete-author')
});
app.controller('createAuthorController', function($scope, $authors, $author, $normalUsers) {
    $scope.$watch(function() {
        return $normalUsers.get()
    }, function(newVal) {
        $scope.users = newVal;
        $scope.user = $normalUsers.get(0);
    });
    $normalUsers.load();
    $scope.submit = function(more) {
        $author.create($scope, $authors, $normalUsers, $scope.user, more);
    };
    $scope.dismiss = function() {
        $scope.userError = '';
    };
    modalEvent($scope, 'create-author', 1)
});