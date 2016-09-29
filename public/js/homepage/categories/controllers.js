app.controller('categoryController', function ($scope, category) {
    category.load();
    $scope.$watch(function () {
        return category.get()
    }, function (newVal) {
        $scope.category = newVal
    })
});
app.controller('newestArticleByCategoryController', function ($scope, categoryFactory, category) {
    $scope.article = {};
    $scope.$watch(function () {
        return category.get()
    }, function (newVal) {
        if (newVal.id) {
            categoryFactory.load.articles(newVal.id, 1)
                .then(function (response) {
                    $scope.article = response.data
                }, function (response) {

                })
        }
    })
});
app.controller('hotArticlesByCategoryController', function ($scope, categoryFactory, category) {
    $scope.articles = [];
    $scope.$watch(function () {
        return category.get()
    }, function (newVal) {
        if (newVal.id) {
            categoryFactory.load.articles(newVal.id, 2)
                .then(function (response) {
                    $scope.articles = response.data
                }, function (response) {

                })
        }
    })
});
app.controller('relatedArticlesByCategoryController', function ($scope, categoryFactory, category) {
    $scope.articles = [];
    $scope.$watch(function () {
        return category.get()
    }, function (newVal) {
        if (newVal.id) {
            categoryFactory.load.articles(newVal.id)
                .then(function (response) {
                    $scope.articles = response.data;
                }, function (response) {

                })
        }
    })
});