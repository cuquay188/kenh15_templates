app.controller('categoryController', function ($scope, category, articlesByCategory) {
    category.load();
    $scope.$watch(function () {
        return category.get()
    }, function (newVal) {
        if (newVal.id) {
            $scope.category = newVal;
            articlesByCategory.load()
        }
    })
});
app.controller('newestArticleByCategoryController', function ($scope, articlesByCategory) {
    $scope.article = {};
    $scope.$watch(function () {
        return articlesByCategory.get.all()
    }, function () {
        $scope.article = articlesByCategory.get.newest()
    })
});
app.controller('hotArticlesByCategoryController', function ($scope, articlesByCategory) {
    $scope.articles = [];
    $scope.$watch(function () {
        return articlesByCategory.get.all()
    }, function (newVal) {
        $scope.articles = newVal;
    })
});
app.controller('relatedArticlesByCategoryController', function ($scope, articlesByCategory) {
    $scope.articles = [];
    $scope.$watch(function () {
        return articlesByCategory.get.newest()
    }, function () {
        $scope.articles = articlesByCategory.get.related()
    })
});