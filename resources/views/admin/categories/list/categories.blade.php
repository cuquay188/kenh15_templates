<div class="body-header">
    <h2>Categories Management</h2>
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
                <input type="text" class="form-control search" ng-model="categoryFilter" placeholder="Search...">
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
            <th ng-click="sortType = 'articles'; sortReverse=!sortReverse" class="center sortable"
                ng-class="{'sort': sortType=='articles'}" style="width:125px;">
                Article(s)
                <span ng-show="sortType == 'articles' && !sortReverse"><i
                            class="glyphicon glyphicon-sort-by-alphabet"></i></span>
                <span ng-show="sortType == 'articles' && sortReverse"><i
                            class="glyphicon glyphicon-sort-by-alphabet-alt"></i></span>
            </th>
            <th ng-click="sortType = 'advance.is_hot'; sortReverse=!sortReverse" class="sortable"
                ng-class="{'sort': sortType=='advance.is_hot'}" style="width:200px;">
                Hot
                <span ng-show="sortType == 'advance.is_hot' && !sortReverse"><i
                            class="glyphicon glyphicon-sort-by-alphabet"></i></span>
                <span ng-show="sortType == 'advance.is_hot' && sortReverse"><i
                            class="glyphicon glyphicon-sort-by-alphabet-alt"></i></span>
            </th>
            <th style="width:200px;">Action</th>
            <th>Note</th>
        </tr>
        </thead>
        <tbody>
        <tr dir-paginate="category in categories | filter : categoryFilter | orderBy:sortType:sortReverse | itemsPerPage: itemsPerPage.item"
            ng-controller="categoryController">
            <td><a href="{{route('admin.category')}}/%%category.id%%">%%category.name%%</a></td>
            <td class="center">%%category.articles%%</td>
            <td>
                <button class="btn btn-xs btn-toggle hot" ng-click="setHot()"
                        {{Auth::getUser()->is_admin() || Auth::getUser()->is_author() ? "" : "disabled"}}
                        ng-class="{'btn-default':!category.advance.is_hot,'btn-primary':category.advance.is_hot}"></button>
                <button class="btn btn-xs btn-toggle" ng-click="setHeader()"
                        {{Auth::getUser()->is_admin() || Auth::getUser()->is_author() ? "" : "disabled"}}
                        ng-show="category.advance.is_hot"
                        ng-class="{'btn-default':!category.advance.is_header,'btn-primary':category.advance.is_header}">
                    Show to header
                </button>
            </td>
            <td>
                {{--Edit Function--}}
                <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                        data-target="#update-category"
                        ng-click="edit()">Edit
                </button>
                {{--Delete Function--}}
                <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                        data-target="#delete-category"
                        {{Auth::getUser()->is_admin() || Auth::getUser()->is_author() ? "" : "disabled"}}
                        ng-click="delete()">Delete
                </button>
            </td>
            <td>%%category.note%%</td>
        </tr>
        <tr ng-if="categories==null">
            <td colspan="6" class="empty-table">
                No categories is available.
                <a href="#" data-toggle="modal" data-target="#create-category">Create a new one</a>.
            </td>
        </tr>
        </tbody>
    </table>
    <dir-pagination-controls></dir-pagination-controls>
</div>