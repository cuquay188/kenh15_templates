app.controller('categoryController', function ($scope, category) {
    category.load(getCategoryIdPath());

    $scope.$watch(function () {
        return category.get()
    }, function (newVal, oldVal) {
        $scope.category = newVal
    })
});
app.controller('hotArticlesByCategoryController', function ($scope, articles) {
    articles.load(getCategoryIdPath());

    $scope.$watch(function () {
        return articles.get()
    }, function (newVal) {
        $scope.articles = newVal;
        console.log(newVal);
    })
});