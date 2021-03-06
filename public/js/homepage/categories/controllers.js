app.controller('categoryController', function ($scope, category, articles) {
    category.load();
    $scope.$watch(function () {
        return category.get()
    }, function (newVal) {
        if (newVal.id) {
            $scope.category = newVal;
            document.title = newVal.name;
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
        setListHotHeight();
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
app.controller('categoriesController', function ($scope, categories) {
    categories.load();
    $scope.$watch(function () {
        return categories.get.all()
    }, function (newVal) {
        $scope.categories = newVal;
    })
});
app.controller('hotCategoriesController', function ($scope, categories) {
    $scope.$watch(function () {
        return categories.get.all()
    }, function () {
        $scope.categories = categories.get.hot();
    })
});
app.controller('articlesByHotCategoryController', function ($http, $scope, articles, categories) {
    $http.get(url.category.hotArticles($scope.category.id))
        .then(function (response) {
            $scope.articles = response.data
        }, function (response) {
            console.log(response)
        })
});