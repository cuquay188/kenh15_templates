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