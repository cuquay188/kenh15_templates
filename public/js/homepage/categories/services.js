app.service('category', function ($http) {
    var category = {};
    return {
        get: function () {
            return category
        },
        set: function (newCategory) {
            category = newCategory;
            return category
        },
        load: function (id) {
            $http.get(url.category(id))
                .then(function (response) {
                        category = response.data;
                    },
                    function (response) {
                        console.log(response)
                    })
        }
    }
});