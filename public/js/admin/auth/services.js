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
                    $scope.showFullName = $scope.showBirth = $scope.showTel = $scope.showAddress = $scope.showCity = false;
                }, function(response) {
                    $scope.errors = response.data;
                })
            }
        }
    }
})