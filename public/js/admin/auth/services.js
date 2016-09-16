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
            info: function($scope, $http, user) {
                $http.post(url.auth.update.info, user).then(function(response) {
                    $auth = response.data.user;
                    $scope.errors = null;
                }, function(response) {
                    console.log(response)
                    $scope.errors = response.data;
                })
            }
        }
    }
})