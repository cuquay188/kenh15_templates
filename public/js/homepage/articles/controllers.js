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
app.controller('articlesController', function ($scope, articles) {
    articles.load(3);
    $scope.$watch(function () {
        return articles.get.all()
    }, function (newVal) {
        $scope.articles = newVal
    })
});
app.controller('newestArticleController', function ($scope, articles) {
    $scope.$watch(function () {
        return articles.get.all()
    }, function () {
        $scope.newestArticle = articles.get.newest()
    })
});
app.controller('latestArticlesController', function ($scope, articles) {
    $scope.$watch(function () {
        return articles.get.newest()
    }, function () {
        $scope.articles = articles.get.related.byCategory()
    })
});