app.config(function ($routeProvider) {
    $routeProvider
        .when("/home", {
            templateUrl: url.home.view,
            controller: 'articlesController'
        })
        .when("/tag/:url?", {
            templateUrl: url.tag.view,
            controller: 'tagController'
        })
        .when("/category/:url?", {
            templateUrl: url.category.view,
            controller: 'categoryController'
        })
        .when("/article/:url?", {
            templateUrl: url.article.view,
            controller: 'articleController'
        })
});