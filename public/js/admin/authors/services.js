app.service('$authors', function() {
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
        load: function($http) {
            $http.get(url.author.select.authors).then(function(response) {
                $authors = response.data;
                return $authors;
            });
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
app.service('$normalUsers', function() {
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
        load: function($http) {
            $users.splice(1, $users.length - 1);
            $http.get(url.author.select.users).then(function(response) {
                $.each(response.data, function(i, user) {
                    user.label = user.name + ' - ' + user.username;
                    $users.push(user);
                })
            });
        },
        remove: function(id) {
            $users = $users.filter(function(user) {
                return user.id != id
            })
        }
    }
});
app.service('$author', function($window, $timeout) {
    var $author = {};
    return {
        get: function() {
            return $author;
        },
        set: function($newAuthor) {
            $author = $newAuthor;
            return $author
        },
        update: function($scope, $http, $auth, author) {
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
                if ($author.id == $auth.get().id) $auth.load($http);
                notify('Update author: \"' + $author.name + '\" successful.', 'success');
                $author = null;
            }, function(response) {
                if (response.status == errorStatus) {
                    notify('Unknown problem. The page will automatically refresh after ' + delayToRefresh / 1000 + ' seconds or you can press F5 to quick refresh.', 'warning')
                    $timeout(function() {
                        $window.location.reload();
                    }, delayToRefresh);
                } else {
                    $scope.nameErrors = response.data.name ? (response.data.name + '') : '';
                    $scope.addressErrors = response.data.address ? (response.data.address + '') : '';
                    $scope.cityErrors = response.data.city ? (response.data.city + '') : '';
                    $scope.birthErrors = response.data.birth ? (response.data.birth + '') : '';
                    $scope.telErrors = response.data.tel ? (response.data.tel + '') : '';
                    var text = '';
                    $.each(response.data, function(index, val) {
                        text += val[0] + '\n';
                    });
                    notify(text, 'danger')
                }
            })
        },
        create: function($scope, $http, $authors, $normalUsers, user, more) {
            $http.post(url.author.create, {
                id: user.id
            }).then(function(response) {
                $author = response.data.author;
                $authors.add($author);
                if (!more) $('.modal.in').modal('hide');
                notify('Promote user: \"' + $author.name + '\" successful.', 'success');
                $author = null;
                $normalUsers.remove(user.id);
                $scope.userError = '';
            }, function(response) {
                if (response.status == errorStatus) {
                    notify('Unknown problem. The page will automatically refresh after ' + delayToRefresh / 1000 + ' seconds or you can press F5 to quick refresh.', 'warning')
                    $timeout(function() {
                        $window.location.reload();
                    }, delayToRefresh);
                } else {
                    $scope.userError = 'You need to select an user to promote.';
                    notify('You need to select an user to promote.', 'warning')
                }
            })
        },
        remove: function($scope, $http, $authors, $normalUsers) {
            $http.post(url.author.remove, {
                id: $author.id
            }).then(function(response) {
                $authors.remove(response.data.author.id);
                $normalUsers.load($http);
                $('.modal.in').modal('hide');
                notify('Demote author: \"' + $author.name + '\" successful.', 'success');
            }, function() {
                if (response.status == errorStatus) {
                    notify('Unknown problem. The page will automatically refresh after ' + delayToRefresh / 1000 + ' seconds or you can press F5 to quick refresh.', 'warning')
                    $timeout(function() {
                        $window.location.reload();
                    }, delayToRefresh);
                } else {
                    notify('Can not demote author: \"' + $author.name + '\".', 'success');
                }
            })
        }
    }
});