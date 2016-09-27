app.service('$tags', function() {
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
        load: function($http) {
            $http.get(url.tag.select).then(function(response) {
                $tags = response.data;
                return $tags;
            });
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
app.service('$tag', function($window,$timeout) {
    var $tag = {};
    return {
        get: function() {
            return $tag;
        },
        set: function($newTag) {
            $tag = $newTag;
            return $tag
        },
        update: function($scope, $http, name) {
            $http.post(url.tag.update, {
                id: $tag.id,
                name: name
            }).then(function(response) {
                $tag = response.data.tag;
                $scope.tag.name = $tag.name;
                $('.modal.in').modal('hide');
                $scope.nameErrors = '';
                notify('Update tag: \"' + $tag.name + '\" successful.', 'success')
            }, function(response) {
                if (response.status == errorStatus) {
                    notify('Unknown problem. The page will automatically refresh after ' + delayToRefresh / 1000 + ' seconds or you can press F5 to quick refresh.', 'warning')
                    $timeout(function() {
                        $window.location.reload();
                    }, delayToRefresh);
                } else {
                    $scope.nameErrors = response.data.name + '';
                    var text = '';
                    $.each(response.data, function(index, val) {
                        text += val[0] + '\n';
                    });
                    notify(text, 'danger')
                }
            })
        },
        create: function($scope, $http, $tags, name, more) {
            $http.post(url.tag.create, {
                name: name
            }).then(function(response) {
                $tag = response.data.tag;
                $tags.add($tag);
                if (!more) $('.modal.in').modal('hide');
                notify('Create tag: \"' + $tag.name + '\" successful.', 'success')
                $tag = null;
                $scope.nameErrors = '';
                $scope.newName = '';
            }, function(response) {
                if (response.status == errorStatus) {
                    notify('Unknown problem. The page will automatically refresh after ' + delayToRefresh / 1000 + ' seconds or you can press F5 to quick refresh.', 'warning')
                    $timeout(function() {
                        $window.location.reload();
                    }, delayToRefresh);
                } else {
                    $scope.nameErrors = response.data.name + '';
                    var text = '';
                    $.each(response.data, function(index, val) {
                        text += val[0] + '\n';
                    });
                    notify(text, 'danger')
                }
            })
        },
        remove: function($scope, $http, $tags) {
            $http.post(url.tag.remove, {
                id: $tag.id
            }).then(function(response) {
                $tags.remove(response.data.tag.id);
                $('.modal.in').modal('hide');
                notify('Remove tag: \"' + $tag.name + '\" successful.', 'success')
            }, function() {
                if (response.status == errorStatus) {
                    notify('Unknown problem. The page will automatically refresh after ' + delayToRefresh / 1000 + ' seconds or you can press F5 to quick refresh.', 'warning')
                    $timeout(function() {
                        $window.location.reload();
                    }, delayToRefresh);
                } else {
                    notify('Can not remove tag: \"' + $tag.name + '\" successful.', 'danger')
                }
            })
        }
    }
});