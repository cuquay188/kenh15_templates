app.controller('tagController', function ($scope, tag, articles) {
    tag.load();
    $scope.$watch(function () {
        return tag.get()
    }, function (newVal) {
        if (newVal.id) {
            $scope.tag = newVal;
            articles.load(2)
        }
    })
});
app.controller('relatedArticlesByTagController', function ($scope, articles) {
    $scope.$watch(function () {
        return articles.get.all()
    }, function (newVal) {
        $scope.articles = newVal
    })
});