<div class="sidebar-header">
    <a class="brand" href="{{Route::getCurrentRoute()->getPath()==''?route('login'):route('article')}}">Kenh 15
        Admin</a>
    <a class="options"><i class="glyphicon glyphicon-cog"></i></a>
</div>
<div class="sidebar-body">
    <div class="item">
        <div class="item-header">
            General
        </div>
        <ul class="item-body">
            <li>
                <a class="{{Route::getCurrentRoute()->getName()=='article'?'active':''}}"
                   href="{{route('article')}}">
                    Articles
                    <span>({{count(App\Article::all())}})</span>
                </a>
                <a class="create {{Route::getCurrentRoute()->getName()=='create_article'?'active':''}}"
                   href="{{route('create_article')}}"><i class="glyphicon glyphicon-plus"></i></a>
            </li>
            <li>
                <a class="{{Route::getCurrentRoute()->getName()=='author'?'active':''}}"
                   href="{{route('author')}}">
                    Authors
                    <span>({{count(App\Author::all())}})</span>
                </a>
                <a class="create {{Route::getCurrentRoute()->getName()=='create_author'?'active':''}}"
                   href="{{route('create_author')}}"><i class="glyphicon glyphicon-plus"></i></a>
            </li>
            <li>
                <a class="{{Route::getCurrentRoute()->getName()=='category'?'active':''}}"
                   href="{{route('category')}}">
                    Categories
                    <span>({{count(App\Category::all())}})</span>
                </a>
                <a class="create {{Route::getCurrentRoute()->getName()=='create_category'?'active':''}}"
                   href="{{route('create_category')}}"><i class="glyphicon glyphicon-plus"></i></a>
            </li>
            <li>
                <a class="{{Route::getCurrentRoute()->getName()=='tag'?'active':''}}"
                   href="{{route('tag')}}">
                    Tags
                    <span>({{count(App\Tag::all())}})</span>
                </a>
                <a class="create {{Route::getCurrentRoute()->getName()=='create_tag'?'active':''}}"
                   href="{{route('create_tag')}}"><i class="glyphicon glyphicon-plus"></i></a>
            </li>
        </ul>
    </div>
    <div class="sidebar-footer">
        <div class="info">
            <div class="icon"></div>
            <div class="name">
                <a href="{{route('user_management')}}">
                    {{Auth::getUser()->fullname}}<br>
                    <label>{{Auth::getUser()->email}}</label>
                </a>
            </div>
        </div>
        <div class="logout"><a id="logout" title="Logout" href="{{route('logout')}}"><span
                        class="glyphicon glyphicon-log-out"></span></a></div>
    </div>
</div>