app.controller('categoriesListController', function ($scope, $http, $log, $categories) {
    $scope.$watch(function () {
        return $categories.get()
    }, function (newVal) {
        $scope.categories = newVal;
    });

    $scope.$watch(function () {
        return $categories.sizeOf.is_header()
    }, function (newVal, oldVal) {
        if (newVal > oldVal && newVal > 5)
            alert('You should not place more than 5 category to header.')
    });

    $scope.sortType = 'advance.is_hot && articles';
    $scope.sortReverse = 1;
});

app.controller('categoryController', function ($scope, $http, $log, $category) {
    $scope.edit = function () {
        $category.set($scope.category);
    };
    $scope.delete = function () {
        $category.set($scope.category);
    };
    $scope.setHot = function () {
        $category.set($scope.category);
        $category.update.hot($scope,$http);
    };
    $scope.setHeader = function () {
        $category.set($scope.category);
        $category.update.header($scope,$http);
    }
});

app.controller('editCategoryController', function ($scope, $http, $category) {
    $scope.$watch(function () {
        return $category.get()
    }, function (newVal) {
        $scope.category = newVal;
        if ($scope.category)
            $scope.category.newName = $scope.category.name;
    });
    $scope.dismiss = function () {
        $category.set(null);
        $scope.nameErrors = '';
    };
    $scope.submit = function () {
        $category.update.name($scope, $http, $scope.category.newName)
    };
    modalEvent($scope,'edit-category')
});

app.controller('deleteCategoryController', function ($scope, $http, $categories, $category) {
    $scope.$watch(function () {
        return $category.get()
    }, function (newVal) {
        $scope.category = newVal;
    });
    $scope.dismiss = function () {
        $category.set(null);
    };
    $scope.submit = function () {
        $category.remove($scope, $http, $categories)
    };
    modalEvent($scope,'delete-category')
});

app.controller('createCategoryController', function ($scope, $http, $categories, $category) {
    $scope.submit = function (more) {
        $category.create($scope, $http, $categories, $scope.newName, more);
    };
    modalEvent($scope,'create-category',1)
});