app.controller('categoryController', function ($scope, category) {
    category.load();
    $scope.$watch(function () {
        return category.get()
    }, function (newVal) {
        $scope.category = newVal
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
                    console.log(response);
                })
        }
})
});
app.controller('newestArticleByCategoryController', function ($scope, categoryFactory) {

});
app.controller('hotArticlesByCategoryController', function ($scope, categoryFactory) {

});