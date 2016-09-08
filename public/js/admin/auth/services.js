app.service('$auth', function() {
    var $auth = {};
    return {
    	get: function(){
    		return $auth;
    	},
        load: function($http) {
            $http.get(url.user.auth.get).then(function(response) {
                $auth = response.data;
            })
        }
    }
})