app.service('$tags', function () {
    var $tags = {};
    return {
        get: function () {
            return $tags;
        },
        set: function ($newTags) {
            $tags = $newTags;
            return $tags
        },
        size: function () {
            return $tags.length;
        },
        load: function ($http) {
            $http.get(url.tag.get)
                .then(function (response) {
                    $tags = response.data;
                    return $tags;
                });
        },
        add: function ($tag) {
            $tags.push($tag);
        },
        remove: function (id) {
            $tags = $tags.filter(function (tag) {
                return tag.id != id
            });
            return $tags;
        }
    };
});
app.service('$tag', function () {
    var $tag = {};
    return {
        get: function () {
            return $tag;
        },
        set: function ($newTag) {
            $tag = $newTag;
            return $tag
        },
        update: function ($scope, $http, name) {
            $http.post(url.tag.update, {
                id: $tag.id,
                name: name
            }).then(function (response) {
                $tag = response.data.tag;
                $scope.tag.name = $tag.name;
                $('.modal.in').modal('hide');
                $scope.tagName = '';
                $scope.nameErrors = '';
            }, function (response) {
                $scope.nameErrors = response.data.name + '';
            })
        },
        create: function ($scope, $http, $tags, name,more) {
            $http.post(url.tag.create, {
                name: name
            }).then(function (response) {
                $tag = response.data.tag;
                $tags.add($tag);
                if(!more)
                    $('.modal.in').modal('hide');
                $tag = null;
                $scope.tagName = '';
                $scope.nameErrors = '';
            }, function (response) {
                $scope.nameErrors = response.data.name + '';
            })
        },
        remove: function ($scope, $http, $tags) {
            $http.post(url.tag.remove, {
                id: $tag.id
            }).then(function (response) {
                $tags.remove(response.data.tag.id);
                $('.modal.in').modal('hide');
            }, function (response) {
                $scope.errors = response.data.message;
            })
        }
    }
});