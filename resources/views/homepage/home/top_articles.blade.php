<!-- bài đọc nhiều nhất -->
<div class="top-view">
    <div class="head-top">
        <a href="#">Top Articles</a>
    </div>
    <div class="body-top">
        <ul>
            <li ng-repeat="article in articles | orderBy: '-views' | limitTo: 5">
                <a href="[[article | parseUrl:'article']]">[[article.shorten_title]]</a>
            </li>
        </ul>
    </div>
    <div class="footer-top">
        <a href="#">View all</a>
    </div>
</div>
<!-- end -->