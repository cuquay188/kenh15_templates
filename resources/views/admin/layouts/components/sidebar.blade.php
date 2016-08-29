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
                    <span ng-bind="'('+articleLength+')'"></span>
                </a>
                <a class="create" data-toggle="modal"
                   data-target="#create-article"
                   href="#"><i class="glyphicon glyphicon-plus"></i></a>
            </li>
            <li>
                <a class="{{Route::getCurrentRoute()->getName()=='author'?'active':''}}"
                   href="{{route('author')}}">
                    Authors
                    <span ng-bind="'('+authorLength+')'"></span>
                </a>
                <a class="create" data-toggle="modal"
                   data-target="#create-author"
                   href="#"><i class="glyphicon glyphicon-plus"></i></a>
            </li>
            <li>
                <a class="{{Route::getCurrentRoute()->getName()=='admin.category'?'active':''}}"
                   href="{{route('admin.category')}}">
                    Categories
                    <span ng-bind="'('+categoryLength+')'"></span>
                </a>
                <a class="create" data-toggle="modal" data-target="#create-category"
                   href="#"><i class="glyphicon glyphicon-plus"></i></a>
            </li>
            <li>
                <a class="{{Route::getCurrentRoute()->getName()=='admin.tag'?'active':''}}"
                   href="{{route('admin.tag')}}">
                    Tags
                    <span ng-bind="'('+tagLength+')'"></span>
                </a>
                <a class="create" data-toggle="modal" data-target="#create-tag"
                   href="#"><i class="glyphicon glyphicon-plus"></i></a>
            </li>
        </ul>
    </div>
    <div class="item">
        <div class="item-header">
            User
        </div>
        <ul class="item-body">
            <li>
                <a class="{{Route::getCurrentRoute()->getName()=='user_management'?'active':''}}"
                   href="{{route('user_management')}}">
                    Profile
                </a>
            </li>
            <li>
                <a href="#">Setting</a>
            </li>
        </ul>
    </div>
    @if(Auth::getUser()->admin)
        <div class="item">
            <div class="item-header">
                Admin
            </div>
            <ul class="item-body">
                <li>
                    <a class="{{Route::getCurrentRoute()->getName()=='users'?'active':''}}"
                       href="{{route('users')}}">
                        Users
                        <span>({{count(App\User::all())}})</span>
                    </a>
                </li>
            </ul>
        </div>
    @endif
    <div class="sidebar-footer">
        <div class="info">
            <div class="icon"></div>
            <div class="name">
                <a href="{{route('user_management')}}">
                    {{Auth::getUser()->name}}<br>
                    <label>{{Auth::getUser()->admin ? 'Admin' : (Auth::getUser()->author ? 'Author': 'Normal User')}}</label>
                </a>
            </div>
        </div>
        <div class="logout"><a id="logout" title="Logout" href="{{route('logout')}}"><span
                        class="glyphicon glyphicon-log-out"></span></a></div>
    </div>
</div>