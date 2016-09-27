app.service('relatedArticles', function ($http) {
    var articles = [];
    return {
        get: function () {
            return articles
        },
        set: function (newArticles) {
            articles = newArticles;
            return articles
        },
        load: function (category_id) {
            var newUrl = '';
            if (category_id)
                newUrl = url.articles(category_id);
            $http.get(newUrl)
                .then(function (response) {
                        articles = response.data;
                    },
                    function (response) {
                        console.log(response)
                    })
        }
    }
});
app.service('newestArticle', function ($http) {
    var article = {};
    return {
        get: function () {
            return article
        },
        set: function (newArticle) {
            article = newArticle;
            return article
        },
        load: function (category_id) {
            var newUrl = url.newestArticle(category_id);
            $http.get(newUrl)
                .then(function (response) {
                        article = response.data;
                    },
                    function (response) {
                        console.log(response)
                    })
        }
    }
});
app.service('hotArticles', function ($http) {
    var $articles = [];
    return {
        get: function () {
            return $articles
        },
        set: function (newArticles) {
            $articles = newArticles;
            return $articles
        },
        load: function (category_id) {
            var newUrl = url.hotArticles(category_id);
            $http.get(newUrl)
                .then(function (response) {
                    $articles = response.data
                }, function (response) {
                    console.log(response)
                })
        }
    }
});