app.controller('sidebarController', function($scope, $http, $location, $articles, $authors, $tags, $categories) {
    $scope.$watch(function() {
        return $articles.size()
    }, function(newVal) {
        $scope.articleLength = newVal
    });
    $scope.$watch(function() {
        return $authors.size()
    }, function(newVal) {
        $scope.authorLength = newVal
    });
    $scope.$watch(function() {
        return $tags.size()
    }, function(newVal) {
        $scope.tagLength = newVal
    });
    $scope.$watch(function() {
        return $categories.sizeOf.categories()
    }, function(newVal) {
        $scope.categoryLength = newVal
    });
});
app.directive('userAvatar', function() {
    return {
        template: '<img>',
        link: function(scope, el) {
            scope.$watch('user', function(user) {
                if (!angular.equals(user, {})) {
                    /*Remove url type*/
                    var url = user.img_url;
                    url = url.substr(0, url.indexOf('?type'));
                    /*Set img*/
                    var $img = angular.element(el[0].querySelector('img'));
                    $img.css({
                        'width': '35px',
                        'border-radius': '50%'
                    }).attr({
                        'src': url,
                    });
                }
            })
        }
    };
});