app.service('$auth', function($http,appFactory) {
    var $auth = {};
    return {
        get: function() {
            return $auth;
        },
        load: function() {
            $http.get(url.auth.select).then(function(response) {
                $auth = response.data;
            })
        },
        update: {
            info: function($scope, $authors, user) {
                $http.post(url.auth.update.info, user).then(function(response) {
                    $auth = response.data.user;
                    if ($auth.is_author) {
                        $authors.remove($auth.author.id);
                        $authors.add($auth);
                    }
                    $scope.errors = null;
                    $scope.showUpdateFullName = $scope.showUpdateBirth = $scope.showUpdateTel = $scope.showUpdateAddress = $scope.showUpdateCity = false;
                    appFactory.notify('Update profile successful.', 'success')
                }, function(response) {
                    return appFactory.errorPage(response, function() {
                        $scope.errors = response.data;
                        var text = '';
                        $.each($scope.errors, function(index, val) {
                            text += val[0] + '\n';
                        });
                        appFactory.notify(text, 'danger')
                    })
                })
            },
            password: function($scope, password) {
                $http.post(url.auth.update.password, password).then(function(response) {
                    $scope.showUpdatePassword = false;
                    $scope.errors = null;
                    $scope.currentPassword = $scope.newPassword = $scope.confirmNewPassword = null;
                    appFactory.notify('Update profile password successful.', 'success')
                }, function(response) {
                    return appFactory.errorPage(response, function() {
                        $scope.errors = response.data;
                        appFactory.notify($scope.errors.current_password ? $scope.errors.current_password : $scope.errors.new_password, 'danger')
                    })
                })
            },
            username: function($scope, $authors, username) {
                $http.post(url.auth.update.username, username).then(function(response) {
                    $auth = response.data.user;
                    if ($auth.is_author) {
                        $authors.remove($auth.author.id);
                        $authors.add($auth);
                    }
                    $scope.errors = null;
                    $scope.showUpdateUsername = false;
                    appFactory.notify('Update username successful.', 'success')
                }, function(response) {
                    return appFactory.errorPage(response, function() {
                        $scope.errors = response.data;
                        appFactory.notify('Can not update profile.', 'danger')
                    })
                })
            }
        }
    }
})