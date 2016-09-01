app.controller('articlesListController', function ($scope, $http, $log, $articles) {
    $scope.$watch(function () {
        return $articles.get()
    }, function (newVal) {
        $scope.articles = newVal;
    });

    $scope.sortType = 'last_updated';
    $scope.sortReverse = 1;
    $scope.itemsPerPage = {
        items: [5, 10, 20, 50],
        item: 5
    };
});
app.controller('articleController', function ($scope, $log, $article, $categories, $tags, $authors) {

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

app.controller('createArticleController', function ($scope, $http, $articles, $article, $tags, $authors, $categories) {

    $scope.$watch(function () {
        return $tags.get()
    }, function (newVal) {
        $scope.tags = newVal;
    });
    $scope.$watch(function () {
        return $authors.get()
    }, function (newVal) {
        $scope.authors = newVal;
    });
    $scope.$watch(function () {
        return $categories.get()
    }, function (newVal) {
        $scope.categories = newVal;
        $scope.newCategory = 0;
    });

    $scope.errors = {
        title: '',
        content: '',
        tags: '',
        category: '',
        author: ''
    };

    $scope.submit = function (more) {
        var newTags = [],
            newAuthors = [];
        $.each($scope.tags, function (i, val) {
            if (val.checked)
                newTags.push(val.id);
        });
        $.each($scope.authors, function (i, val) {
            if (val.checked)
                newAuthors.push(val.id);
        });
        $scope.newArticle = {
            category: $scope.category,
            tags: newTags,
            authors: newAuthors,
            title: $scope.title,
            content: CKEDITOR.instances.create_article.getData()
        };
        $article.create($scope, $http, $articles, $scope.newArticle, more);
    };
});