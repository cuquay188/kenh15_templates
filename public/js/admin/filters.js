app.filter('datetime', function() {
    return function(x, type, format) {
        if (type == 'date') return moment(x).format(format ? format : 'DD/MM/YYYY')
        if (type == 'time') return moment(x).format(format ? format : 'hh:mm:ss a')
        return moment(x).format(format ? format : 'DD/MM/YYYY, hh:mm:ss a')
    }
}).filter('shorten', function() {
    return function(str, i) {
        if (str && str.length > i)
            for (i - 1; i >= 0; i--)
                if (str[i] == ' ') return str.substring(0, i) + '...';
        return str;
    }
}).filter('role', function() {
    return function(user) {
        if (user.is_admin == 1) return 'Admin';
        if (user.is_author == 1) return 'Author';
        return 'Normal User'
    }
});