app.service('$authors', function () {
    var $authors = [];
    return {
        get: function () {
            return $authors;
        },
        set: function ($newAuthor) {
            $authors = $newAuthor;
            return $authors
        },
        size: function () {
            return $authors.length;
        },
        load: function ($http) {
            $http.get(url.author.select)
                .then(function (response) {
                    $authors = response.data;
                    return $authors;
                });
        },
        add: function ($author) {
            $authors.push($author);
        },
        remove: function (id) {
            $authors = $authors.filter(function (author) {
                return author.id != id
            });
            return $authors;
        }
    };
});
app.service('$author', function () {
    var $author = {};
    return {
        get: function () {
            return $author;
        },
        set: function ($newAuthor) {
            $author = $newAuthor;
            return $author
        },
        update: function ($scope, $http, author) {
            $http.post(url.author.update, {
                id: $author.id,
                name: author.newName,
                address: author.newAddress,
                city: author.newCity,
                birth: author.newBirth,
                tel: author.newTel,
                email: author.newEmail
            }).then(function (response) {
                $author.name = response.data.author.name;
                $author.address = response.data.author.address;
                $author.city = response.data.author.city;
                $author.age = response.data.author.age;
                $author.birth = response.data.author.birth;
                $author.tel = response.data.author.tel;
                $author.email = response.data.author.email;
                $('.modal.in').modal('hide');
                $scope.nameErrors =
                    $scope.addressErrors =
                        $scope.cityErrors =
                            $scope.birthErrors =
                                $scope.telErrors =
                                    $scope.emailErrors = '';
            }, function (response) {
                $scope.nameErrors = response.data.name ? (response.data.name + '') : '';
                $scope.addressErrors = response.data.address ? (response.data.address + '') : '';
                $scope.cityErrors = response.data.city ? (response.data.city + '') : '';
                $scope.birthErrors = response.data.birth ? (response.data.birth + '') : '';
                $scope.telErrors = response.data.tel ? (response.data.tel + '') : '';
                $scope.emailErrors = response.data.email ? (response.data.email + '') : '';
            })
        },
        create: function ($scope, $http, $authors, name, more) {
            $http.post(url.author.create, {
                name: name
            }).then(function (response) {
                $author = response.data.author;
                $author.add($author);
                if (!more)
                    $('.modal.in').modal('hide');
                $author = null;
                $scope.nameErrors = '';
            }, function (response) {
                $scope.nameErrors = response.data.name + '';
            })
        },
        remove: function ($scope, $http, $authors) {
            $http.post(url.author.remove, {
                id: $author.id
            }).then(function (response) {
                console.log(response);
                $authors.remove(response.data.author.id);
                $('.modal.in').modal('hide');
            },function (response) {
                console.log(response);
            })
        }
    }
});