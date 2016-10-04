<div class="top-view">
    <div class="head-top">
        <a href="#">Related Articles</a>
    </div>
    <div class="body-top">
        <ul>
            <li ng-repeat="article in articles | orderBy: '-id' | limitTo: 5">
                <a href="#">[[article.shorten_title]]</a>
            </li>
        </ul>
    </div>
    <div class="footer-top">
        <a href="#">View all</a>
    </div>
</div>