<div class="newest-article" ng-controller="newestArticleController">
    <div class="picture" style="background-image: url('[[newestArticle.img_url]]')">
        <div class="backdrop">
            <a href="[[newestArticle | parseUrl: 'article']]">
                <img src="[[newestArticle.img_url]]" style="max-height: 200px;max-width: 300px">
            </a>
        </div>
    </div>
    <div class="title">
        <a href="[[newestArticle | parseUrl: 'article']]">[[newestArticle.title]]</a>
    </div>
    <div class="content" ng-bind-html="newestArticle.shorten_content">
    </div>
</div>
<div class="latest-articles" ng-controller="latestArticlesController">
    <div class="article" ng-repeat="article in articles | orderBy: '-id' | limitTo: 4">
        <div class="picture" style="background-image: url('[[article.img_url]]')">
            <div class="backdrop">
                <a href="[[article | parseUrl: 'article']]">
                    <img src="[[article.img_url]]">
                </a>
            </div>
        </div>
        <div class="title">
            <a href="[[article | parseUrl: 'article']]">[[article.shorten_title]]</a>
        </div>
    </div>
</div>