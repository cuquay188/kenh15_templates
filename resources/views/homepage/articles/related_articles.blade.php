<div class="top-view" ng-controller="relatedArticlesController">
    <div class="head-top">
        <a href="#">Related Articles</a>
    </div>
    <div class="body-top">
        <ul>
            <li ng-repeat="article in articles | orderBy: '-id' | limitTo: 5">
                <a href="{{route('homepage').'/article/'}}[[article.url]]">[[article.shorten_title]]</a>
            </li>
        </ul>
    </div>
    <div class="footer-top">
        <a href="{{route('homepage').'/category/'}}[[article.category.url]]">View all</a>
    </div>
</div>