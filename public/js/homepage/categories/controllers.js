app.controller('categoryController', function ($scope, category) {
    category.load(getCategoryIdPath());

    $scope.$watch(function () {
        return category.get()
    }, function (newVal, oldVal) {
        $scope.category = newVal
    })
});
app.controller('relatedArticlesByCategoryController', function ($scope, relatedArticles) {
    relatedArticles.load(getCategoryIdPath());

    $scope.$watch(function () {
        return relatedArticles.get()
    }, function (newVal) {
        $scope.articles = newVal;
    })
});
app.controller('newestArticleByCategoryController', function ($scope, newestArticle) {
    newestArticle.load(getCategoryIdPath());

    $scope.$watch(function () {
        return newestArticle.get()
    }, function (newVal) {
        $scope.newestArticle = newVal;
    })
});
app.controller('hotArticlesByCategoryController', function ($scope, hotArticles) {
    hotArticles.load(getCategoryIdPath());

    $scope.$watch(function () {
        return hotArticles.get()
    }, function (newVal) {
        $scope.articles = newVal;
    })
});