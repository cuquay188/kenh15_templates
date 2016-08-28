app.controller('categoriesListController', function ($scope, $http, $log, $categories) {
    $scope.$watch(function () {
        return $categories.get()
    }, function (newVal) {
        $scope.categories = newVal;
    });
    $scope.itemsPerPage = {
        items: [7, 14, 21],
        item: 7
    };
    $scope.sortType = 'advance.is_hot';
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
    }
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
    }
});

app.controller('createCategoryController', function ($scope, $http, $categories, $category) {
    $scope.create = function (more) {
        $category.create($scope, $http, $categories, $scope.categoryName, more);
    }
});