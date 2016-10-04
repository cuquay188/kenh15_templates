app.controller('articleController', function ($scope, article) {
    article.load.article();
    $scope.$watch(function () {
        return article.get.article()
    }, function (newVal) {
        if (newVal.id) {
            $scope.article = newVal;
        }
    })
});
app.controller('relatedArticlesController', function ($scope, article) {
    article.load.relatedArticles();
    $scope.$watch(function () {
        return article.get.relatedArticles()
    }, function (newVal) {
        $scope.articles = newVal
    })
});