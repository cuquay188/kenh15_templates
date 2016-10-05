app.controller('categoryController', function ($scope, category, articles) {
    category.load();
    $scope.$watch(function () {
        return category.get()
    }, function (newVal) {
        if (newVal.id) {
            $scope.category = newVal;
            articles.load(1)
        }
    })
});
app.controller('newestArticleByCategoryController', function ($scope, articles) {
    $scope.article = {};
    $scope.$watch(function () {
        return articles.get.all()
    }, function () {
        $scope.article = articles.get.newest()
    })
});
app.controller('hotArticlesByCategoryController', function ($scope, articles) {
    $scope.articles = [];
    $scope.$watch(function () {
        return articles.get.all()
    }, function (newVal) {
        $scope.articles = newVal;
    })
});
app.controller('relatedArticlesByCategoryController', function ($scope, articles) {
    $scope.articles = [];
    $scope.$watch(function () {
        return articles.get.newest()
    }, function () {
        $scope.articles = articles.get.related.byCategory()
    })
});