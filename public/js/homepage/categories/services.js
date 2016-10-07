app.factory('categoryFactory', function ($http) {
    return {
        load: {
            category: function (category_url) {
                var newUrl = url.category.info(category_url);
                return $http.get(newUrl)
            },
            categories: function () {
                var newUrl = url.category.hot();
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
app.service('categories', function (categoryFactory) {
    var categories = [];
    return {
        get: {
            all: function () {
                return categories
            },
            hot: function () {
                return categories.filter(function (category) {
                    return category.advance.is_hot != 0
                })
            }
        },
        set: function (newCategories) {
            categories = newCategories;
            return categories
        },
        load: function () {
            categoryFactory.load.categories()
                .then(function (response) {
                    categories = response.data
                }, function (response) {
                    console.log(response)
                })
        }
    }
});
