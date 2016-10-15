<div class="category shadow" ng-repeat="category in categories | orderBy: '-articles'">
    <a href="{{route('homepage')}}/category/[[category.url]]"
       class="head">
        <div>
            [[category.name]]
        </div>
    </a>
    <div class="articles" ng-controller="articlesByHotCategoryController">
        <div class="article">
            <div class="picture" style="background-image: url('[[articles[0].img_url]]')">
                <div class="backdrop">
                    <a href="{{route('homepage')}}/article/[[articles[0].url]]"><img src="[[articles[0].img_url]]"></a>
                </div>
            </div>
            <div class="title">
                <a href="{{route('homepage')}}/article/[[articles[0].url]]">[[articles[0].shorten_title]]</a>
            </div>
        </div>
        <div class="articles-list">
            <div class="list">
                <ul>
                    <li ng-repeat="article in articles" ng-if="article.id != articles[0].id">
                        <a href="{{route('homepage')}}/article/[[article.url]]">[[article.shorten_title]]</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>