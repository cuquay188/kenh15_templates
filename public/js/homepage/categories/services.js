app.factory('categoryFactory', function ($http) {
    return {
        load: {
            category: function (category_id) {
                var newUrl = url.category.info(category_id);
                return $http.get(newUrl)
            },
            articles: function (category_id) {
                var newUrl = url.category.articles(category_id);
                return $http.get(newUrl)
            }
        }
    }
});
app.service('category', function (categoryFactory) {
    var category = {};
    return {
        get: function () {
            return category
        },
        set: function (newCategory) {
            category = newCategory;
            return category
        },
        load: function () {
            categoryFactory.load.category(getCategoryIdPath())
                .then(function (response) {
                    category = response.data
                }, function (response) {
                    console.log(response)
                })
        }
    }
});
app.service('articles', function (categoryFactory) {
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
        load: function () {
            categoryFactory.load.articles(getCategoryIdPath())
                .then(function (response) {
                    articles = response.data
                }, function (response) {

                })
        }
    }
});