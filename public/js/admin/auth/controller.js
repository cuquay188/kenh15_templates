app.controller('authController', function($scope, $auth) {
	$scope.$watch(function(){
		return $auth.get()
	},function(user){
		$scope.user = user;
	})
})