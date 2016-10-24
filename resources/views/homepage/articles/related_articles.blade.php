<div class="top-view" ng-controller="relatedArticlesController">
    <div class="head-top">
        <a href="#">Related Articles</a>
    </div>
    <div class="body-top">
        <ul>
            <li ng-repeat="article in articles | orderBy: '-id' | limitTo: 5">
                <a href="[[article | parseUrl: 'article']]">[[article.shorten_title]]</a>
            </li>
        </ul>
    </div>
    <div class="footer-top">
        <a href="[[article.category | parseUrl: 'category']]">View all</a>
    </div>
</div>