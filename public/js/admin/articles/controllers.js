app.controller('articlesListController', function($scope, $http, $log, $articles) {
    $scope.$watch(function() {
        return $articles.get()
    }, function(newVal) {
        $scope.articles = newVal;
    });
    $scope.sortType = 'updated_at';
    $scope.sortReverse = 1;
    $scope.itemsPerPage = {
        items: [5, 10, 20, 50],
        item: 5
    };
});
app.filter('array', function() {
  return function(items) {
    var filtered = [];
    angular.forEach(items, function(item) {
      filtered.push(item);
    });
   return filtered;
  };
});
app.controller('articleController', function($scope, $log, $article) {
    $scope.edit = function() {
        $article.set($scope.article);
    };
    $scope.delete = function() {
        $article.set($scope.article);
    };
});
app.controller('articleCategoryController', function($scope, $categories) {
    $scope.$watchGroup(['article.category_id', function() {
        return $categories.get()
    }], function(newVal) {
        $scope.allCategories = newVal[1];
        $.each($scope.allCategories, function(i, val) {
            if ($scope.article && val && val.id == $scope.article.category_id) {
                $scope.article.category = val;
                return false;
            }
        });
    });
});
app.controller('articleTagController', function($scope, $tags, $article, $tag) {
    $scope.$watchGroup(['article.tags_id', function() {
        return $tags.get();
    }], function(newVal) {
        var allTags = newVal[1];
        $scope.tags = [];
        $.each(newVal[0], function(i, val) {
            var index = find(allTags, val);
            if (index != -1) $scope.tags.push(allTags[index]);
        });
    });
    $scope.delete = function(tag) {
        $article.set($scope.article);
        $tag.set(tag)
    }
});
app.controller('articleAuthorController', function($scope, $authors, $article, $author) {
    $scope.$watchGroup(['article.authors_id', function() {
        return $authors.get();
    }], function(newVal) {
        var allAuthors = newVal[1];
        $scope.authors = [];
        $.each(newVal[0], function(i, val) {
            var index = find(allAuthors, val);
            if (index != -1) $scope.authors.push(allAuthors[index]);
        });
    });
    $scope.delete = function(author) {
        $article.set($scope.article);
        $author.set(author)
    }
});
app.controller('editArticleController', function($scope, $http, $article, $tags, $authors, $categories) {
    $scope.$watchGroup([
        function() {
            return $tags.get()
        },
        function() {
            return $authors.get()
        },
        function() {
            return $categories.get()
        },
        function() {
            return $article.get.article();
        }
    ], function(newVal) {
        $scope.tags = newVal[0];
        $scope.authors = newVal[1];
        $scope.categories = newVal[2];
        $scope.article = newVal[3];
        if (newVal[3]) {
            if (newVal[3].id) {
                $article.get.content($http);
                $scope.category = $scope.article.category.id;
                $scope.title = $scope.article.title;
            }
            $.each($scope.article.tags_id, function(i, val) {
                var index = find($scope.tags, val);
                if (index != -1) $scope.tags[index].checked = true;
            });
            $.each($scope.article.authors_id, function(i, val) {
                var index = find($scope.authors, val);
                if (index != -1) $scope.authors[index].checked = true;
            });
        }
    });
    $scope.$watchGroup(['article.tags_id', 'article.authors_id'], function(newVal) {
        $.each($scope.tags, function(i, val) {
            val.checked = false;
        });
        $.each($scope.authors, function(i, val) {
            val.checked = false;
        });
        $.each(newVal[0], function(i, val) {
            var index = find($scope.tags, val);
            if (index != -1) $scope.tags[index].checked = true;
        });
        $.each(newVal[1], function(i, val) {
            var index = find($scope.authors, val);
            if (index != -1) $scope.authors[index].checked = true;
        });
    });
    $scope.dismiss = function() {
        $article.set(null);
        $.each($scope.tags, function(i, val) {
            val.checked = false;
        });
        $.each($scope.authors, function(i, val) {
            val.checked = false;
        });
        $scope.errors = {
            content: '',
            title: '',
            tags: '',
            category: '',
            authors: ''
        }
    };
    $scope.submit = function() {
        var newTags = [],
            newAuthors = [];
        $.each($scope.tags, function(i, val) {
            if (val.checked) newTags.push(val.id);
        });
        $.each($scope.authors, function(i, val) {
            if (val.checked) newAuthors.push(val.id);
        });
        $scope.newArticle = {
            category: $scope.category,
            tags: newTags,
            authors: newAuthors,
            title: $scope.title,
            content: CKEDITOR.instances.edit_article.getData()
        };
        $article.update($scope, $http, $scope.newArticle)
    };
});
app.controller('deleteArticleController', function($scope, $http, $articles, $article) {
    $scope.$watch(function() {
        return $article.get.article()
    }, function(newVal) {
        $scope.article = newVal;
    });
    $scope.dismiss = function() {
        $article.set(null);
    };
    $scope.submit = function() {
        $article.remove.article($scope, $http, $articles)
    };
    modalEvent($scope, 'delete-article')
});
app.controller('deleteArticleTagController', function($scope, $http, $article, $tag) {
    $scope.$watch(function() {
        return $article.get.article()
    }, function(newVal) {
        $scope.article = newVal;
    });
    $scope.$watch(function() {
        return $tag.get()
    }, function(newVal) {
        $scope.tag = newVal;
    });
    $scope.submit = function() {
        $article.remove.tag($scope, $http, $tag);
    };
    modalEvent($scope, 'delete-article-tag')
});
app.controller('deleteArticleAuthorController', function($scope, $http, $article, $author) {
    $scope.$watch(function() {
        return $article.get.article()
    }, function(newVal) {
        $scope.article = newVal;
    });
    $scope.$watch(function() {
        return $author.get()
    }, function(newVal) {
        $scope.author = newVal;
    });
    $scope.submit = function() {
        $article.remove.author($scope, $http, $author);
    };
    modalEvent($scope, 'delete-article-author')
});
app.controller('createArticleController', function($scope, $http, $articles, $article, $tags, $authors, $categories) {
    $scope.$watch(function() {
        return $tags.get()
    }, function(newVal) {
        $scope.tags = newVal;
    });
    $scope.$watch(function() {
        return $authors.get()
    }, function(newVal) {
        $scope.authors = newVal;
    });
    $scope.$watch(function() {
        return $categories.get()
    }, function(newVal) {
        $scope.categories = newVal;
        $scope.category = '?';
    });
    $scope.submit = function(more) {
        var newTags = [],
            newAuthors = [];
        $.each($scope.tags, function(i, val) {
            if (val.checked) newTags.push(val.id);
        });
        $.each($scope.authors, function(i, val) {
            if (val.checked) newAuthors.push(val.id);
        });
        $scope.newArticle = {
            category: $scope.category,
            tags: newTags,
            authors: newAuthors,
            title: $scope.title,
            content: CKEDITOR.instances.create_article.getData()
        };
        $article.create($scope, $http, $articles, $scope.newArticle, more);
    };
});