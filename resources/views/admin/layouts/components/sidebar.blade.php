<div class="sidebar-header">
    <a class="brand" href="#dashboard">Kenh 15
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
                <a href="#articles">
                    Articles
                    <span ng-bind="'('+articleLength+')'"></span>
                </a>
                <a class="create"
                   data-toggle="modal" data-target="#create-article"><i class="glyphicon glyphicon-plus"></i></a>
            </li>
            <li>
                <a href="#authors">
                    Authors
                    <span ng-bind="'('+authorLength+')'"></span>
                </a>
                <a class="create"
                   data-toggle="modal" data-target="#create-author"
                   data-backdrop="false"><i class="glyphicon glyphicon-plus"></i></a>
            </li>
            <li>
                <a href="#categories">
                    Categories
                    <span ng-bind="'('+categoryLength+')'"></span>
                </a>
                <a class="create"
                   data-toggle="modal" data-target="#create-category"
                   data-backdrop="false"><i class="glyphicon glyphicon-plus"></i></a>
            </li>
            <li>
                <a href="#tags">
                    Tags
                    <span ng-bind="'('+tagLength+')'"></span>
                </a>
                <a class="create"
                   data-toggle="modal" data-target="#create-tag"
                   data-backdrop="false"><i class="glyphicon glyphicon-plus"></i></a>
            </li>
        </ul>
    </div>
    <div class="item">
        <div class="item-header">
            User
        </div>
        <ul class="item-body">
            <li>
                <a href="#profile">
                    Profile
                </a>
            </li>
            <li>
                <a href="#">Setting</a>
            </li>
        </ul>
    </div>
    @if(Auth::getUser()->is_admin())
        <div class="item">
            <div class="item-header">
                Admin
            </div>
            <ul class="item-body">
                <li>
                    <a class="{{Route::getCurrentRoute()->getName()=='users'?'active':''}}"
                       href="#">
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
                <a href="#profile">
                    {{Auth::getUser()->name ? Auth::getUser()->name : Auth::getUser()->email}}<br>
                    <label>{{Auth::getUser()->is_admin() ? 'Admin' : (Auth::getUser()->author ? 'Author': 'Normal User')}}</label>
                </a>
            </div>
        </div>
        <div class="logout"><a id="logout" title="Logout" href="{{route('admin.auth.logout')}}"><span
                        class="glyphicon glyphicon-log-out"></span></a></div>
    </div>
</div>