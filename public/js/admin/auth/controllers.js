app.controller('authController', function($scope, $http, $authors, $auth) {
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
            name: $scope.newName,
            tel: $scope.newTel,
            birth: moment($('#birth').datepicker("getDate")).format('YYYY-MM-DD'),
            address: $scope.newAddress,
            city: $scope.newCity,
        }
        $auth.update.info($scope, $http, $authors, user);
    }
})