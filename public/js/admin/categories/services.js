app.service('$categories', function () {
    var $categories = [];
    return {
        get: function () {
            return $categories;
        },
        set: function ($newCategories) {
            $categories = $newCategories;
            return $categories
        },
        sizeOf: {
            categories: function () {
                return $categories.length;
            },
            is_header: function () {
                if ($categories.length) {
                    var count = 0;
                    $.each($categories, function (i, category) {
                        if (category.advance.is_header == 1)
                            count++;
                    });
                    return count;
                }
                return 0;
            },
            is_hot: function () {
                if ($categories.length) {
                    var count = 0;
                    $.each($categories, function (i, category) {
                        if (category.advance.is_hot == 1)
                            count++;
                    });
                    return count;
                }
                return 0;
            }
        },
        load: function ($http) {
            $http.get(url.category.get)
                .then(function (response) {
                    $categories = response.data;
                    return $categories;
                });
        },
        add: function ($category) {
            $categories.push($category);
            return $categories
        },
        remove: function (id) {
            $categories = $categories.filter(function (category) {
                return category.id != id
            });
            return $categories;
        }
    };
});
app.service('$category', function () {
    var $category = {};
    return {
        get: function () {
            return $category;
        },
        set: function ($newCategory) {
            $category = $newCategory;
            return $category
        },
        update: {
            name: function ($scope, $http, name) {
                $http.post(url.category.update.name, {
                    id: $category.id,
                    name: name
                }).then(function (response) {
                    $category = response.data.category;
                    $scope.category.name = $category.name;
                    $('.modal.in').modal('hide');
                    $scope.categoryName = '';
                    $scope.nameErrors = '';
                }, function (response) {
                    $scope.nameErrors = response.data.name + '';
                })
            },
            hot: function ($scope, $http) {
                $http.post(url.category.update.hot, {
                    id: $category.id
                }).then(function (response) {
                    $category = response.data.category;
                    $scope.category.advance.is_hot = $category.advance.is_hot;
                    $scope.category.advance.is_header = $category.advance.is_header;
                    $category = null;
                })
            },
            header: function ($scope, $http) {
                $http.post(url.category.update.header, {
                    id: $category.id
                }).then(function (response) {
                    $category = response.data.category;
                    $scope.category.advance.is_header = $category.advance.is_header;
                    $category = null;
                })
            }
        },
        create: function ($scope, $http, $categories, name, more) {
            $http.post(url.category.create, {
                name: name
            }).then(function (response) {
                $category = response.data.category;
                $categories.add($category);
                if (!more)
                    $('.modal.in').modal('hide');
                $category = null;
                $scope.categoryName = '';
                $scope.nameErrors = '';
            }, function (response) {
                $scope.nameErrors = response.data.name + '';
            })
        },
        remove: function ($scope, $http, $categories) {
            $http.post(url.category.remove, {
                id: $category.id
            }).then(function (response) {
                $categories.remove(response.data.category.id);
                $('.modal.in').modal('hide');
            })
        }
    }
});