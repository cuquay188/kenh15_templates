app.service('$categories', function($http, appFactory) {
    var $categories = [];
    return {
        get: function() {
            return $categories;
        },
        set: function($newCategories) {
            $categories = $newCategories;
            return $categories
        },
        sizeOf: {
            categories: function() {
                return $categories.length;
            },
            is_header: function() {
                if ($categories.length) {
                    var count = 0;
                    $.each($categories, function(i, category) {
                        if (category.advance.is_header == 1) count++;
                    });
                    return count;
                }
                return 0;
            },
            is_hot: function() {
                if ($categories.length) {
                    var count = 0;
                    $.each($categories, function(i, category) {
                        if (category.advance.is_hot == 1) count++;
                    });
                    return count;
                }
                return 0;
            }
        },
        load: function() {
            $http.get(url.category.select).then(function(response) {
                $categories = response.data;
                return $categories;
            }, appFactory.errorPage);
        },
        add: function($category) {
            $categories.push($category);
            return $categories
        },
        remove: function(id) {
            $categories = $categories.filter(function(category) {
                return category.id != id
            });
            return $categories;
        }
    };
});
app.service('$category', function($http, appFactory) {
    var $category = {};
    return {
        get: function() {
            return $category;
        },
        set: function($newCategory) {
            $category = $newCategory;
            return $category
        },
        update: {
            name: function($scope, name) {
                $http.post(url.category.update.name, {
                    id: $category.id,
                    name: name
                }).then(function(response) {
                    $category = response.data.category;
                    $scope.category.name = $category.name;
                    $('.modal.in').modal('hide');
                    $scope.nameErrors = '';
                    appFactory.notify('Update category: \"' + $category.name + '\" successful.', 'success');
                    $category = null;
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
            hot: function($scope) {
                $http.post(url.category.update.hot, {
                    id: $category.id
                }).then(function(response) {
                    $category = response.data.category;
                    $scope.category.advance.is_hot = $category.advance.is_hot;
                    $scope.category.advance.is_header = $category.advance.is_header;
                    if ($scope.category.advance.is_hot) appFactory.notify('Add category \"' + $category.name + '\" to hot categories.', 'success')
                    else appFactory.notify('Remove category \"' + $category.name + '\" from hot categories.', 'danger')
                    $category = null;
                }, appFactory.errorPage)
            },
            header: function($scope) {
                $http.post(url.category.update.header, {
                    id: $category.id
                }).then(function(response) {
                    $category = response.data.category;
                    $scope.category.advance.is_header = $category.advance.is_header;
                    if ($scope.category.advance.is_header) appFactory.notify('Add category \"' + $category.name + '\" to homepage header bar.', 'success')
                    else appFactory.notify('Remove category \"' + $category.name + '\" from homepage header bar.', 'danger')
                    $category = null;
                }, appFactory.errorPage)
            }
        },
        create: function($scope, $categories, name, more) {
            $http.post(url.category.create, {
                name: name
            }).then(function(response) {
                $category = response.data.category;
                $categories.add($category);
                if (!more) $('.modal.in').modal('hide');
                appFactory.notify('Create category: \"' + $category.name + '\" successful.', 'success');
                $category = null;
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
        remove: function($scope, $categories) {
            $http.post(url.category.remove, {
                id: $category.id
            }).then(function(response) {
                $categories.remove(response.data.category.id);
                $('.modal.in').modal('hide');
            }, appFactory.errorPage(response))
        }
    }
});