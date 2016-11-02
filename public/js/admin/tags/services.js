app.service('$tags', function($http, appFactory) {
    var $tags = [];
    return {
        get: function() {
            return $tags;
        },
        set: function($newTags) {
            $tags = $newTags;
            return $tags
        },
        size: function() {
            return $tags.length;
        },
        load: function() {
            $http.get(url.tag.select).then(function(response) {
                $tags = response.data;
                return $tags;
            }, appFactory.errorPage);
        },
        add: function($tag) {
            $tags.push($tag);
        },
        remove: function(id) {
            $tags = $tags.filter(function(tag) {
                return tag.id != id
            });
            return $tags;
        }
    };
});
app.service('$tag', function($http, appFactory) {
    var $tag = {};
    return {
        get: function() {
            return $tag;
        },
        set: function($newTag) {
            $tag = $newTag;
            return $tag
        },
        update: function($scope, name) {
            $http.post(url.tag.update, {
                id: $tag.id,
                name: name
            }).then(function(response) {
                $tag = response.data.tag;
                $scope.tag.name = $tag.name;
                $('.modal.in').modal('hide');
                $scope.nameErrors = '';
                appFactory.notify('Update tag: \"' + $tag.name + '\" successful.', 'success')
            }, function(response) {
                return appFactory.errorPage(response, function() {
                    $scope.nameErrors = response.data.name + '';
                    var text = '';
                    $.each(response.data, function(index, val) {
                        text += val[0] + '\n';
                    });
                    appFactory.notify(text, 'danger')
                })
            })
        },
        create: function($scope, $tags, name, more) {
            $http.post(url.tag.create, {
                name: name
            }).then(function(response) {
                $tag = response.data.tag;
                $tags.add($tag);
                if (!more) $('.modal.in').modal('hide');
                appFactory.notify('Create tag: \"' + $tag.name + '\" successful.', 'success')
                $tag = null;
                $scope.nameErrors = '';
                $scope.newName = '';
            }, function(response) {
                return appFactory.errorPage(response, function() {
                    $scope.nameErrors = response.data.name + '';
                    var text = '';
                    $.each(response.data, function(index, val) {
                        text += val[0] + '\n';
                    });
                    appFactory.notify(text, 'danger')
                })
            })
        },
        remove: function($scope, $tags) {
            $http.post(url.tag.remove, {
                id: $tag.id
            }).then(function(response) {
                $tags.remove(response.data.tag.id);
                $('.modal.in').modal('hide');
                appFactory.notify('Remove tag: \"' + $tag.name + '\" successful.', 'success')
            }, appFactory.errorPage)
        }
    }
});