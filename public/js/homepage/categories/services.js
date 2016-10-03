app.factory('categoryFactory', function ($http) {
    return {
        load: {
            category: function (category_url) {
                var newUrl = url.category.info(category_url);
                return $http.get(newUrl)
            },
            articles: function (category_url) {
                var newUrl = url.category.articles(category_url);
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
            categoryFactory.load.category(getUrlPath())
                .then(function (response) {
                    category = response.data
                }, function (response) {
                    console.log(response)
                })
        }
    }
});
