app.factory('tagFactory', function ($http) {
    return {
        load: {
            tag: function (tag_url) {
                var newUrl = url.tag.info(tag_url);
                return $http.get(newUrl)
            },
            articles: function (tag_url) {
                var newUrl = url.tag.articles(tag_url);
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
            tagFactory.load.tag(getUrlPath())
                .then(function (response) {
                    tag = response.data
                }, function (response) {
                    console.log(response)
                })
        }
    }
});