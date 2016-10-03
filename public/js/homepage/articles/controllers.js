app.controller('articleController', function ($scope, article) {
    article.load();
    $scope.$watch(function () {
        return article.get()
    }, function (newVal) {
        $scope.article = newVal
    })
});