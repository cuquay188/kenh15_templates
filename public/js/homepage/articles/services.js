app.service('articles', function ($http) {
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