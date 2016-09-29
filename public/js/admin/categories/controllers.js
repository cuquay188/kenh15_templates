app.controller('categoriesListController', function($rootScope, $scope, $categories) {
    $scope.$watch(function() {
        return $categories.get()
    }, function(newVal) {
        $scope.categories = newVal;
    });
    $scope.$watch(function() {
        return $categories.sizeOf.is_header()
    }, function(newVal, oldVal) {
        if (newVal > oldVal && newVal > 5) notify('You should\'nt place more than 5 category to homepage header bar.', 'warning')
    });
    $rootScope.sortType = 'advance.is_hot+advance.is_header';
    $rootScope.sortReverse = true;
});
app.controller('categoryController', function($scope, $category) {
    $scope.edit = function() {
        $category.set($scope.category);
    };
    $scope.delete = function() {
        $category.set($scope.category);
    };
    $scope.setHot = function() {
        $category.set($scope.category);
        $category.update.hot($scope);
    };
    $scope.setHeader = function() {
        $category.set($scope.category);
        $category.update.header($scope);
    }
});
app.controller('editCategoryController', function($scope, $category) {
    $scope.$watch(function() {
        return $category.get()
    }, function(newVal) {
        $scope.category = newVal;
        if ($scope.category) $scope.category.newName = $scope.category.name;
    });
    $scope.dismiss = function() {
        $category.set(null);
        $scope.nameErrors = '';
    };
    $scope.submit = function() {
        $category.update.name($scope, $scope.category.newName)
    };
    modalEvent($scope, 'edit-category')
});
app.controller('deleteCategoryController', function($scope, $categories, $category) {
    $scope.$watch(function() {
        return $category.get()
    }, function(newVal) {
        $scope.category = newVal;
    });
    $scope.dismiss = function() {
        $category.set(null);
    };
    $scope.submit = function() {
        $category.remove($scope, $categories)
    };
    modalEvent($scope, 'delete-category')
});
app.controller('createCategoryController', function($scope, $categories, $category) {
    $scope.submit = function(more) {
        $category.create($scope, $categories, $scope.newName, more);
    };
    modalEvent($scope, 'create-category', 1)
});