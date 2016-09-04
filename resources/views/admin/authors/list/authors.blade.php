<div class="body-header">
    <h2>Authors Management</h2>
</div>
<div class="container">
    <div class="row">
    <div class="col col-lg-1 col-sm-2">
        <div class="form-group">
            <select class="form-control"
                    ng-options="x for x in itemsPerPage.items"
                    ng-model="itemsPerPage.item">
            </select>
        </div>
    </div>
    <div class="col col-lg-8 col-sm-5">
    </div>
    <div class="col col-lg-3 col-sm-5">
        <div class="form-group">
            <input type="text" class="form-control search" ng-model="authorFilter" placeholder="Search...">
            <span><i class="glyphicon glyphicon-search"> </i></span>
        </div>
    </div>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th ng-click="sortType = 'name'; sortReverse=!sortReverse;" class="sortable"
            ng-class="{'sort': sortType=='name'}" style="width:200px;">
            Name
            <span ng-show="sortType == 'name' && !sortReverse"><i
                        class="glyphicon glyphicon-sort-by-alphabet"></i></span>
            <span ng-show="sortType == 'name' && sortReverse"><i
                        class="glyphicon glyphicon-sort-by-alphabet-alt"></i></span>
        </th>
        <th>Address</th>
        <th ng-click="sortType = 'age'; sortReverse=!sortReverse;" class="sortable"
            ng-class="{'sort': sortType=='age'}" style="width:50px;">
            Age
            <span ng-show="sortType == 'age' && !sortReverse"><i
                        class="glyphicon glyphicon-sort-by-alphabet"></i></span>
            <span ng-show="sortType == 'age' && sortReverse"><i
                        class="glyphicon glyphicon-sort-by-alphabet-alt"></i></span>
        </th>
        <th>Phone</th>
        <th ng-click="sortType = 'email'; sortReverse=!sortReverse;" class="sortable"
            ng-class="{'sort': sortType=='email'}" style="width:150px;">
            Email
            <span ng-show="sortType == 'email' && !sortReverse"><i
                        class="glyphicon glyphicon-sort-by-alphabet"></i></span>
            <span ng-show="sortType == 'email' && sortReverse"><i
                        class="glyphicon glyphicon-sort-by-alphabet-alt"></i></span>
        </th>
        <th style="width:175px;">Action</th>
    </tr>
    </thead>
    <tbody>
    <tr dir-paginate="author in authors | filter: authorFilter | itemsPerPage: itemsPerPage.item | orderBy:sortType:sortReverse"
        ng-controller="authorController">
        <td><a href="#">%%author.name%%</a></td>
        <td>%%author.address + ( author.city ? (', ' + author.city) : '' )%%</td>
        <td>%%author.age%%</td>
        <td>%%author.tel%%</td>
        <td><a href="#" ng-bind="author.email"></a></td>
        <td>
            {{--Edit Function--}}
            <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                    {{Auth::getUser()->is_admin() ? "" : "disabled"}}
                    data-target="#update-author" ng-click="edit()">Update Info
            </button>

            {{--Delete Function--}}
            <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                    {{Auth::getUser()->is_admin() ? "" : "disabled"}}
                    data-target="#delete-author" ng-click="delete()">Demote
            </button>
        </td>
    </tr>
    <tr ng-if="authors==null">
        <td colspan="6" class="empty-table">
            No authors is available. You need to
            <a href="#" data-toggle="modal" data-target="#create-author">promote a user.</a>.
        </td>
    </tr>
    </tbody>
</table>
</div>