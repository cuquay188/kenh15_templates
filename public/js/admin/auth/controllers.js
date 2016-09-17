app.controller('authController', function($scope, $http, $authors, $auth) {
    $scope.$watch(function() {
        return $auth.get()
    }, function(user) {
        $scope.user = user;
        $scope.newName = user.name;
        $scope.newTel = user.tel;
        $scope.newAddress = user.address;
        $scope.newCity = user.city;
        $('#birth').datepicker("setDate", new Date(user.birth));
        $scope.showUpdateFullName = user.name == '' ? true : false;
        $scope.showUpdateTel = user.tel == '' ? true : false;
        $scope.showUpdateAddress = user.address == '' ? true : false;
        $scope.showUpdateCity = user.city == '' ? true : false;
        $scope.showUpdateBirth = user.birth == '0000-00-00' ? true : false;
    });
    $scope.$watchGroup(['newPassword', 'confirmNewPassword'], function(newVal) {
        var newPassword = newVal[0],
            confirmNewPassword = newVal[1];
        if (confirmNewPassword) {
            if (confirmNewPassword != newPassword) $scope.confirmPasswordError = "The confirm password is not match with the new password."
            else {
                $scope.confirmPasswordError = null;
                $scope.isSubmitable = true
            }
        }
    });
    $scope.submitUpdateUserName = function() {
        var username = {
            username: $scope.newUsername
        }
        $auth.update.username($scope, $http, $authors, username);
    };
    $scope.submitUpdateInfo = function() {
        var user = {
            id: $scope.user.id,
            name: $scope.newName,
            tel: $scope.newTel,
            birth: moment($('#birth').datepicker("getDate")).format('YYYY-MM-DD'),
            address: $scope.newAddress,
            city: $scope.newCity,
        }
        $auth.update.info($scope, $http, $authors, user);
    };
    $scope.submitUpdatePassword = function() {
        var password = {
            current_password: $scope.currentPassword,
            new_password: $scope.newPassword
        }
        $auth.update.password($scope, $http, password);
    };
})