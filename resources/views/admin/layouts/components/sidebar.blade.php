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
                <a href="#articles" ng-class="{'active':(hashPath=='articles')}">
                    Articles
                    <span ng-bind="'('+articleLength+')'"></span>
                </a>
                <a class="create" ng-click="notAllowed(auth.is_admin)"
                   data-toggle="modal" data-target="#create-article"><i class="glyphicon glyphicon-plus"></i></a>
            </li>
            <li>
                <a href="#authors" ng-class="{'active':(hashPath=='authors')}">
                    Authors
                    <span ng-bind="'('+authorLength+')'"></span>
                </a>
                <a class="create" ng-click="notAllowed(auth.is_admin)"
                   data-toggle="modal" data-target="#create-author"
                   data-backdrop="false"><i class="glyphicon glyphicon-plus"></i></a>
            </li>
            <li>
                <a href="#categories" ng-class="{'active':(hashPath=='categories')}">
                    Categories
                    <span ng-bind="'('+categoryLength+')'"></span>
                </a>
                <a class="create" ng-click="notAllowed(auth.is_admin)"
                   data-toggle="modal" data-target="#create-category"
                   data-backdrop="false"><i class="glyphicon glyphicon-plus"></i></a>
            </li>
            <li>
                <a href="#tags" ng-class="{'active':(hashPath=='tags')}">
                    Tags
                    <span ng-bind="'('+tagLength+')'"></span>
                </a>
                <a class="create" ng-click="notAllowed(auth.is_admin)"
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
                <a href="#profile" ng-class="{'active':(hashPath=='profile')}">
                    Profile
                </a>
            </li>
            <li>
                <a>Setting</a>
            </li>
        </ul>
    </div>
    <div class="item" ng-if="auth.is_admin">
        <div class="item-header">
            Admin
        </div>
        <ul class="item-body">
            <li>
                <a>
                    Users
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-footer">
        <div class="info" ng-controller="authController">
            <div class="icon" user-avatar></div>
            <div class="name">
                <a href="#profile">
                    <div>%% user.name?user.name:user.email %%</div>
                    <label>%% user | role %%</label>
                </a>
            </div>
        </div>
        <div class="logout"><a id="logout" title="Logout" href="{{route('admin.auth.logout')}}"><span
                        class="glyphicon glyphicon-log-out"></span></a></div>
    </div>
</div>