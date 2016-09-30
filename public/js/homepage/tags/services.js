app.factory('tagFactory', function ($http) {
    return {
        load: {
            tag: function (tag_id) {
                var newUrl = url.tag.info(tag_id);
                return $http.get(newUrl)
            },
            articles: function (tag_id) {
                var newUrl = url.tag.articles(tag_id);
                return $http.get(newUrl)
            }
        }
    }
});
app.service('tag', function (tagFactory) {
    var tag = {};
    return {
        get: function () {
            return tag
        },
        set: function (newTag) {
            tag = newTag;
            return tag
        },
        load: function () {
            tagFactory.load.tag(getIdPath())
                .then(function (response) {
                    tag = response.data
                }, function (response) {
                    console.log(response)
                })
        }
    }
});
app.service('articlesByTag', function (tagFactory) {
    var articles = [];
    return {
        get: function () {
            return articles
        },
        set: function (newArticles) {
            articles = newArticles;
            return articles
        },
        load: function () {
            tagFactory.load.articles(getIdPath())
                .then(function (response) {
                    articles = response.data
                }, function (response) {
                    console.log(response)
                })
        }
    }
});