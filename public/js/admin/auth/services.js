app.service('$auth', function() {
    var $auth = {};
    return {
    	get: function(){
    		return $auth;
    	},
        load: function($http) {
            $http.get(url.auth.select).then(function(response) {
                $auth = response.data;
            })
        }
    }
})