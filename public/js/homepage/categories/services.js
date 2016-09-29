app.factory('categoryFactory', function ($http) {
    return {
        load: {
            category: function (category_id) {
                var newUrl = url.category.info(category_id);
                return $http.get(newUrl)
            },
            articles: function (category_id, type) {
                var newUrl = '';
                if (category_id) {
                    if (type == 1) {
                        newUrl = url.category.newestArticle(category_id);
                        return $http.get(newUrl)
                    } else if (type == 2) {
                        newUrl = url.category.hotArticles(category_id);
                        return $http.get(newUrl)
                    } else {
                        newUrl = url.category.relatedArticles(category_id);
                        return $http.get(newUrl)
                    }
                }
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