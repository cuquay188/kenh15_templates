app.controller('tagController', function ($scope, tag) {
    tag.load();
    $scope.$watch(function () {
        return tag.get()
    }, function (newVal) {
        $scope.tag = newVal
    })
});
app.controller('relatedArticlesByTagController', function ($scope, articlesByTag) {
    articlesByTag.load();
    $scope.$watch(function () {
        return articlesByTag.get()
    }, function (newVal) {
        $scope.articles = newVal
    })
});