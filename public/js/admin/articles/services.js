app.service('$articles', function () {
    var $articles = [];
    return {
        get: function () {
            return $articles;
        },
        set: function ($newArticles) {
            $articles = $newArticles;
            return $articles
        },
        size: function () {
            return $articles.length;
        },
        load: function ($http) {
            $http.get(url.article.select.articles)
                .then(function (response) {
                    $articles = response.data;
                    $.each($articles,function (i,article) {
                        article.updated_at = new Date(article.updated_at.date);
                    });
                    return $articles;
                });
        },
        add: function ($article) {
            $article.updated_at = new Date($article.updated_at.date);
            $articles.push($article);
        },
        remove: function (id) {
            $articles = $articles.filter(function (article) {
                return article.id != id
            });
            return $articles;
        }
    };
});
app.service('$article', function () {
    var $article = {};
    return {
        get: function () {
            return $article;
        },
        set: function ($newArticle) {
            $article = $newArticle;
            return $article
        },
        update: function ($scope, $http, name) {
            $http.post(url.article.update, {
                id: $article.id,
                name: name
            }).then(function (response) {
                $article = response.data.article;
                $scope.article.name = $article.name;
                $('.modal.in').modal('hide');
                $scope.nameErrors = '';
            }, function (response) {
                $scope.nameErrors = response.data.name + '';
            })
        },
        create: function ($scope, $http, $articles, article, more) {
            $http.post(url.article.create, {
                title : article.title,
                content : article.content,
                category: article.category,
                tags : article.tags,
                authors: article.authors
            }).then(function (response) {
                $article = response.data.article;
                $articles.add($article);
                if (!more)
                    $('.modal.in').modal('hide');
                $article = null;
                $scope.errors = null;
            }, function (response) {
                console.log(response);
                $scope.errors = response.data;
            })
        },
        remove: function ($scope, $http, $articles) {
            $http.post(url.article.remove, {
                id: $article.id
            }).then(function (response) {
                $articles.remove(response.data.article.id);
                $('.modal.in').modal('hide');
            })
        }
    }
});