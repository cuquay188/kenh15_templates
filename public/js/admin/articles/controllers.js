app.controller('articlesListController', function ($scope, $http, $log, $articles) {
    $scope.$watch(function () {
        return $articles.get()
    }, function (newVal) {
        $scope.articles = newVal;
    });

    $scope.sortType = 'last_updated';
    $scope.sortReverse = 1;
});
var find = function (array, x) {
    var index = -1;
    $.each(array, function (i, val) {
        if (val.id == x) {
            index = i;
            return false;
        }
    });
    return index;
};
app.controller('articleController', function ($scope, $log, $article, $categories, $tags,$authors) {

    $scope.$watch(function () {
        return $categories.get()
    }, function (newVal) {
        $scope.allCategories = newVal;
        $.each($scope.allCategories, function (i, val) {
            if ($scope.article && val && val.id == $scope.article.category_id) {
                $scope.article.category = val;
                return false;
            }
        });
    });
    $scope.$watch(function () {
        return $tags.get()
    }, function (newVal) {
        if ($scope.article && newVal) {
            var allTags = newVal;
            $scope.article.tags = [];
            $.each($scope.article.tags_id, function (i, val) {
                var index = find(allTags, val);
                if (index != -1) {
                    $scope.article.tags.push(allTags[index]);
                }
            });
        }
    });
    $scope.$watch(function () {
        return $authors.get()
    }, function (newVal) {
        if ($scope.article && newVal) {
            var allAuthors = newVal;
            $scope.article.authors = [];
            $.each($scope.article.authors_id, function (i, val) {
                var index = find(allAuthors, val);
                if (index != -1) {
                    $scope.article.authors.push(allAuthors[index]);
                }
            });
        }
    });

    $scope.edit = function () {
        $article.set($scope.article);
    };
    $scope.delete = function () {
        $article.set($scope.article);
    };
});

app.controller('editArticleController', function ($scope, $http, $article) {
    $scope.$watch(function () {
        return $article.get()
    }, function (newVal) {
        $scope.article = newVal;
        if ($scope.article)
            $scope.article.newName = $scope.article.name;
    });
    $scope.dismiss = function () {
        $article.set(null);
        $scope.nameErrors = '';
    };
    $scope.submit = function () {
        $article.update($scope, $http, $scope.article.newName)
    };
    modalEvent($scope, 'edit-article')
});

app.controller('deleteArticleController', function ($scope, $http, $articles, $article) {
    $scope.$watch(function () {
        return $article.get()
    }, function (newVal) {
        $scope.article = newVal;
    });
    $scope.dismiss = function () {
        $article.set(null);
    };
    $scope.submit = function () {
        $article.remove($scope, $http, $articles)
    };
    modalEvent($scope, 'delete-article')
});

app.controller('createArticleController', function ($scope, $http, $articles, $article) {
    $scope.submit = function (more) {
        $article.create($scope, $http, $articles, $scope.newName, more);
    };
    modalEvent($scope, 'create-article', 1)
});