app.service('$auth', function() {
    var $auth = {};
    return {
        get: function() {
            return $auth;
        },
        load: function($http) {
            $http.get(url.auth.select).then(function(response) {
                $auth = response.data;
                console.log($auth);
            })
        },
        update: {
            info: function($scope, $http, $authors, user) {
                $http.post(url.auth.update.info, user).then(function(response) {
                    $auth = response.data.user;
                    if ($auth.is_author) {
                        $authors.remove($auth.id);
                        $authors.add($auth);
                    }
                    $scope.errors = null;
                    $scope.showUpdateFullName = $scope.showUpdateBirth = $scope.showUpdateTel = $scope.showUpdateAddress = $scope.showUpdateCity = false;
                    notify('Update profile successful.', 'success')
                }, function(response) {
                    $scope.errors = response.data;
                    var text = '';
                    $.each($scope.errors, function(index, val) {
                        text += val[0] + '\n';
                    });
                    notify(text, 'danger')
                })
            },
            password: function($scope, $http, password) {
                $http.post(url.auth.update.password, password).then(function(response) {
                    $scope.showUpdatePassword = false;
                    $scope.errors = null;
                    $scope.currentPassword = $scope.newPassword = $scope.confirmNewPassword = null;
                    notify('Update profile password successful.', 'success')
                }, function(response) {
                    $scope.errors = response.data;
                    notify($scope.errors.current_password ? $scope.errors.current_password : $scope.errors.new_password, 'danger')
                })
            },
            username: function($scope, $http, $authors, username) {
                $http.post(url.auth.update.username, username).then(function(response) {
                    $auth = response.data.user;
                    $authors.remove($auth.id);
                    $authors.add($auth);
                    $scope.errors = null;
                    $scope.showUpdateUsername = false;
                    notify('Update username successful.', 'success')
                }, function(response) {
                    $scope.errors = response.data;
                    notify('Can not update profile.', 'danger')
                })
            }
        }
    }
})