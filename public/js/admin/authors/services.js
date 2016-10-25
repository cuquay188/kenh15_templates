app.service('$authors', function($http, appFactory) {
    var $authors = [];
    return {
        get: function() {
            return $authors;
        },
        set: function($newAuthor) {
            $authors = $newAuthor;
            return $authors
        },
        size: function() {
            return $authors.length;
        },
        load: function() {
            $http.get(url.author.select.authors).then(function(response) {
                $authors = response.data;
                return $authors;
            }, appFactory.errorPage);
        },
        add: function($author) {
            $authors.push($author);
        },
        remove: function(id) {
            $authors = $authors.filter(function(author) {
                return author.id != id
            });
            return $authors;
        }
    };
});
app.service('$normalUsers', function($http, appFactory) {
    var $users = [{
        label: '-- Select one --'
    }];
    return {
        get: function(index) {
            if (index != null) return $users[index];
            return $users
        },
        set: function($newUsers) {
            $users = $newUsers
        },
        load: function() {
            $users.splice(1, $users.length - 1);
            $http.get(url.author.select.users).then(function(response) {
                $.each(response.data, function(i, user) {
                    user.label = user.name + ' - ' + user.username;
                    $users.push(user);
                })
            }, appFactory.errorPage);
        },
        remove: function(id) {
            $users = $users.filter(function(user) {
                return user.id != id
            })
        }
    }
});
app.service('$author', function($http, appFactory) {
    var $author = {};
    return {
        get: function() {
            return $author;
        },
        set: function($newAuthor) {
            $author = $newAuthor;
            return $author
        },
        update: function($scope, $auth, author) {
            $http.post(url.author.update, {
                id: $author.id,
                name: author.newName,
                address: author.newAddress,
                city: author.newCity,
                birth: author.newBirth,
                tel: author.newTel
            }).then(function(response) {
                $author.name = response.data.author.name;
                $author.address = response.data.author.address;
                $author.city = response.data.author.city;
                $author.age = response.data.author.age;
                $author.birth = response.data.author.birth;
                $author.tel = response.data.author.tel;
                $('.modal.in').modal('hide');
                $scope.nameErrors = $scope.addressErrors = $scope.cityErrors = $scope.birthErrors = $scope.telErrors = $scope.emailErrors = '';
                if ($author.id == $auth.get().id) $auth.load();
                appFactory.notify('Update author: \"' + $author.name + '\" successful.', 'success');
                $author = null;
            }, function(response) {
                return appFactory.errorPage(response, function() {
                    $scope.nameErrors = response.data.name ? (response.data.name + '') : '';
                    $scope.addressErrors = response.data.address ? (response.data.address + '') : '';
                    $scope.cityErrors = response.data.city ? (response.data.city + '') : '';
                    $scope.birthErrors = response.data.birth ? (response.data.birth + '') : '';
                    $scope.telErrors = response.data.tel ? (response.data.tel + '') : '';
                    var text = '';
                    $.each(response.data, function(index, val) {
                        text += val[0] + '\n';
                    });
                    appFactory.notify(text, 'danger')
                })
            })
        },
        create: function($scope, $authors, $normalUsers, user, more) {
            $http.post(url.author.create, {
                id: user.id
            }).then(function(response) {
                $author = response.data.author;
                $authors.add($author);
                if (!more) $('.modal.in').modal('hide');
                appFactory.notify('Promote user: \"' + $author.name + '\" successful.', 'success');
                $author = null;
                $normalUsers.remove(user.id);
                $scope.userError = '';
            }, function(response) {
                return appFactory.errorPage(response, function() {
                    $scope.userError = 'You need to select an user to promote.';
                    appFactory.notify('You need to select an user to promote.', 'warning')
                })
            })
        },
        remove: function($scope, $authors, $normalUsers) {
            $http.post(url.author.remove, {
                id: $author.id
            }).then(function(response) {
                $authors.remove(response.data.author.id);
                $normalUsers.load();
                $('.modal.in').modal('hide');
                appFactory.notify('Demote author: \"' + $author.name + '\" successful.', 'success');
            }, function(response) {
                return appFactory.errorPage(response, function() {
                    appFactory.notify('Can not demote author: \"' + $author.name + '\".', 'success');
                })
            })
        }
    }
});