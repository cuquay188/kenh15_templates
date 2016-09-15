app.controller('authController', function($scope, $http, $auth) {
    $scope.$watch(function() {
        return $auth.get()
    }, function(user) {
        $scope.user = user;
        $scope.newName = user.name;
        $scope.newEmail = user.email;
        $scope.newTel = user.tel;
        $scope.newAddress = user.address;
        $scope.newCity = user.city;
        $('#birth').datepicker("setDate", new Date(user.birth));
    })
    $scope.submitUpdateInfo = function(option) {
        var user = {
            id: $scope.user.id,
            name: {
                status: option == 'name' ? 1 : 0,
                data: $scope.newName,
            },
            tel: {
                status: option == 'tel' ? 1 : 0,
                data: $scope.newTel,
            },
            birth: {
                status: option == 'birth' ? 1 : 0,
                data: $('#birth').datepicker("getDate"),
            },
            address: {
                status: option == 'address' ? 1 : 0,
                data: $scope.newAddress,
            },
            city: {
                status: option == 'city' ? 1 : 0,
                data: $scope.newCity,
            }
        }
        $auth.update.info($http, user);
    }
})