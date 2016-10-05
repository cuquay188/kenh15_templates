app.controller('articleController', function ($scope, article, articles) {
    article.load();
    $scope.$watch(function () {
        return article.get()
    }, function (newVal) {
        if (newVal.id) {
            $scope.article = newVal;
            articles.load(1, article.get().category.url);
        }
    })
});
app.controller('relatedArticlesController', function ($scope, articles, article) {
    $scope.$watch(function () {
        return articles.get.all()
    }, function () {
        $scope.articles = articles.get.related.byArticle(article.get().id)
    })
});