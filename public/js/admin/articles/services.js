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
                    $.each($articles, function (i, article) {
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
        get: {
            article: function () {
                return $article;
            },
            content: function ($http) {
                if ($article.content)
                    CKEDITOR.instances.edit_article.setData($article.content);
                else {
                    $http.get(url.article.select.content($article.id))
                        .then(function (response) {
                            $article.content = response.data.content;
                            CKEDITOR.instances.edit_article.setData($article.content);
                        });
                }
                return $article.content
            }
        },
        set: function ($newArticle) {
            $article = $newArticle;
            return $article
        },
        update: function ($scope, $http, article) {
            $http.post(url.article.update, {
                id: $article.id,
                title: article.title,
                content: article.content,
                category: article.category,
                tags: article.tags,
                authors: article.authors
            }).then(function (response) {
                    $article = response.data.article;

                    $scope.article.title = $article.title;
                    $scope.article.updated_at = new Date($article.updated_at.date);
                    $scope.article.url = $article.url;
                    $scope.article.category_id = $article.category_id;
                    $scope.article.tags_id = $article.tags_id;
                    $scope.article.authors_id = $article.authors_id;

                    $('.modal.in').modal('hide');
                    $article = null;
                    $scope.errors = null;
                    $scope.title = '';
                    CKEDITOR.instances.create_article.setData('');
                    $.each($scope.tags, function (i, val) {
                        val.checked = false;
                    });
                    $.each($scope.authors, function (i, val) {
                        val.checked = false;
                    });
                    $scope.category = '?';
                }, function (response) {
                    $scope.errors = response.data;
                }
            )
        },
        create: function ($scope, $http, $articles, article, more) {
            $http.post(url.article.create, {
                title: article.title,
                content: article.content,
                category: article.category,
                tags: article.tags,
                authors: article.authors
            }).then(function (response) {
                $article = response.data.article;
                $articles.add($article);
                if (!more)
                    $('.modal.in').modal('hide');
                $article = null;
                $scope.errors = null;
                $scope.title = '';
                CKEDITOR.instances.create_article.setData('');
                $.each($scope.tags, function (i, val) {
                    val.checked = false;
                });
                $.each($scope.authors, function (i, val) {
                    val.checked = false;
                });
                $scope.category = '?';
            }, function (response) {
                console.log(response);
                $scope.errors = response.data;
            })
        },
        remove: {
            article: function ($scope, $http, $articles) {
                $http.post(url.article.remove.article, {
                    id: $article.id
                }).then(function (response) {
                    $articles.remove(response.data.article.id);
                    $('.modal.in').modal('hide');
                })
            },
            tag: function ($scope, $http, $tag) {
                $http.post(url.article.remove.tag, {
                    article_id: $article.id,
                    tag_id: $tag.get().id
                }).then(function (response) {
                    $article = response.data.article;
                    $scope.article.tags_id = $article.tags_id;
                    $('.modal.in').modal('hide');
                    $article = null;
                    $tag.set(null);
                })
            },
            author: function ($scope, $http, $author) {
                $http.post(url.article.remove.author, {
                    article_id: $article.id,
                    author_id: $author.get().id
                }).then(function (response) {
                    $article = response.data.article;
                    $scope.article.authors_id = $article.authors_id;
                    $('.modal.in').modal('hide');
                    $article = null;
                    $author.set(null);
                })
            }
        }
    }
})
;