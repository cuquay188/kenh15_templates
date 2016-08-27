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
        length: function () {
            if($tag){

            }
            else {
                return $tags.length;
            }
        },
        load: function ($http) {
            $http.get(url.tag.get)
                .then(function (response) {
                    $tags = response.data;
                    return $tags;
                });
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
            }, function (response) {
                $scope.nameErrors = response.data.name + '';
            })
        },
        delete: function ($scope, $http, $tags) {
            $http.post(url.tag.delete, {
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