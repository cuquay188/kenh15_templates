app.controller('authController', function($rootScope, $scope, $http, $authors, $auth) {
    $rootScope.$watch(function() {
        return $auth.get()
    }, function(user) {
        $rootScope.user = user;
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
        };
        if ($scope.newName != $scope.user.name) user.name = $scope.newName;
        if ($scope.newTel != $scope.user.tel) user.tel = $scope.newTel;
        if ($scope.newAddress != $scope.user.address) user.address = $scope.newAddress;
        if ($scope.newCity != $scope.user.city) user.city = $scope.newCity;
        var newBirth = moment($('#birth').datepicker("getDate")).format('YYYY-MM-DD');
        if (newBirth != moment($scope.user.birth).format('YYYY-MM-DD')) user.birth = newBirth;
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