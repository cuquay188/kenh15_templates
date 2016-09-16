app.service('$auth', function() {
    var $auth = {};
    return {
        get: function() {
            return $auth;
        },
        load: function($http) {
            $http.get(url.auth.select).then(function(response) {
                $auth = response.data;
            })
        },
        update: {
            info: function($scope, $http, $authors, user) {
                $http.post(url.auth.update.info, user).then(function(response) {
                    $auth = response.data.user;
                    $authors.remove($auth.id);
                    $authors.add($auth);
                    $scope.errors = null;
                    $scope.showUpdateFullName = $scope.showUpdateBirth = $scope.showUpdateTel = $scope.showUpdateAddress = $scope.showUpdateCity = false;
                }, function(response) {
                    $scope.errors = response.data;
                })
            },
            password: function($scope, $http, password) {
                $http.post(url.auth.update.password, password).then(function(response) {
                    $scope.showUpdatePassword = false;
                    $scope.errors = null;
                    $scope.currentPassword = $scope.newPassword = $scope.confirmNewPassword = null;
                }, function(response) {
                    $scope.errors = response.data;
                })
            },
            username: function($scope, $http, $authors, username) {
                $http.post(url.auth.update.username, username).then(function(response) {
                    $auth = response.data.user;
                    $authors.remove($auth.id);
                    $authors.add($auth);
                    $scope.errors = null;
                    $scope.showUpdateUsername = false;
                }, function(response) {
                    $scope.errors = response.data;
                })
            }
        }
    }
})