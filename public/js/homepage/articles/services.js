app.factory('articleFactory', function ($http) {
    return {
        load: {
            article: function (article_url) {
                var newUrl = url.article.info(article_url);
                return $http.get(newUrl)
            }
        }
    }
});
app.service('article', function (articleFactory) {
    var article = {};
    return {
        get: function () {
            return article
        },
        set: function (newArticle) {
            article = newArticle;
            return article
        },
        load: function () {
            articleFactory.load.article(getUrlPath())
                .then(function (response) {
                    article = response.data;
                    article.updated_at.date = new Date(article.updated_at.date)
                }, function (response) {
                    console.log(response)
                })
        }
    }
});
app.service('articles', function (categoryFactory, tagFactory) {
    var articles = [],
        newest_article = {};
    return {
        get: {
            all: function () {
                return articles
            },
            article: function (article_id) {
                var article = {};
                $.each(articles, function (index, object) {
                    if (object.id == article_id) {
                        article = object;
                        return null;
                    }
                });
                return article
            },
            newest: function () {
                if (articles.length != 0) {
                    var index = 0,
                        max = new Date(articles[index].created_at.date).getTime();
                    $.each(articles, function (i, object) {
                        var time = new Date(object.created_at.date).getTime();
                        if (time > max) {
                            max = time;
                            index = i;
                        }
                    });
                    newest_article = articles[index];
                    return newest_article;
                }
            },
            related: function () {
                return articles.filter(function (article) {
                    return article.id != newest_article.id
                });
            }
        },
        set: function (newArticles) {
            articles = newArticles;
            return articles
        },
        load: function (type) {
            var factory;
            if (type == 1) {
                factory = categoryFactory
            }
            if (type == 2) {
                factory = tagFactory
            }
            factory.load.articles(getUrlPath())
                .then(function (response) {
                    articles = response.data
                }, function (response) {
                    console.log(response)
                })
        }
    }
});