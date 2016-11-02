app.config(function($routeProvider) {
    $routeProvider.when("/dashboard", {
        templateUrl: url.dashboard.view
    }).when("/articles", {
        templateUrl: url.article.view,
        controller: 'articlesListController'
    }).when("/tags", {
        templateUrl: url.tag.view,
        controller: 'tagsListController'
    }).when("/categories", {
        templateUrl: url.category.view,
        controller: 'categoriesListController'
    }).when("/authors", {
        templateUrl: url.author.view,
        controller: 'authorsListController'
    }).when("/profile", {
        templateUrl: url.auth.view.profile
    })
});