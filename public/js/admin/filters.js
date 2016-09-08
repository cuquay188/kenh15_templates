app.filter('date', function() {
    return function(x) {
        return x.getFullYear() + '/' + (x.getMonth() < 10 ? ('0' + x.getMonth()) : x.getMonth()) + '/' + (x.getDay() < 10 ? ('0' + x.getDay()) : x.getDay());
    }
}).filter('time', function() {
    return function(x) {
        return (x.getHours() < 10 ? ('0' + x.getHours()) : x.getHours()) + ':' + (x.getMinutes() < 10 ? ('0' + x.getMinutes()) : x.getMinutes()) + ':' + (x.getSeconds() < 10 ? ('0' + x.getSeconds()) : x.getSeconds())
    }
}).filter('shorten', function() {
    return function(str, i) {
        if (str && str.length > i)
            for (i - 1; i >= 0; i--)
                if (str[i] == ' ') return str.substring(0, i) + '...';
        return str;
    }
}).filter('role',function(){
    return function(user){
        if(user.is_admin==1) return 'Admin';
        if(user.is_author==1) return 'Author';
        return 'Normal User'
    }
});