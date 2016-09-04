<div class="body-header">
    <h2>Articles Management</h2>
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
                <input type="text" class="form-control search" ng-model="articleFilter" placeholder="Search...">
                <span><i class="glyphicon glyphicon-search"> </i></span>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th ng-click="sortType = 'title'; sortReverse=!sortReverse;" class="sortable"
                ng-class="{'sort': sortType=='title'}" style="width:250px;">
                Title
                <span ng-show="sortType == 'title' && !sortReverse"><i
                            class="glyphicon glyphicon-sort-by-alphabet"></i></span>
                <span ng-show="sortType == 'title' && sortReverse"><i
                            class="glyphicon glyphicon-sort-by-alphabet-alt"></i></span>
            </th>
            <th style="width:100px;">Category</th>
            <th ng-click="sortType = 'last_updated'; sortReverse=!sortReverse;" class="sortable"
                ng-class="{'sort': sortType=='last_updated'}" style="width:140px;">
                Last updated
                <span ng-show="sortType == 'last_updated' && !sortReverse"><i
                            class="glyphicon glyphicon-sort-by-alphabet"></i></span>
                <span ng-show="sortType == 'last_updated' && sortReverse"><i
                            class="glyphicon glyphicon-sort-by-alphabet-alt"></i></span>
            </th>
            <th>Author</th>
            <th>Tags</th>
            <th style="width:200px;">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr dir-paginate="article in articles | filter : articleFilter | orderBy:sortType:!sortReverse | itemsPerPage: itemsPerPage.item "
            ng-controller="articleController">
            <td>
                <a data-toggle="modal" data-target="#preview-article"
                   ng-click="edit()" class="tooltip-toggle">
                    %%article.title | shorten:25%%
                </a>
                <span>
                        <h6>%%article.title%%<br></h6>
                    </span>
            </td>
            <td ng-controller="articleCategoryController">
                <a href="{{route('admin.category')}}/%%article.category.id%%">
                    %%article.category.name%%
                </a>
            </td>
            <td style="text-align: center">
                {{--a %%article.updated_at.getTime()%%--}}
                %%article.updated_at | date%% <br>
                %%article.updated_at | time%%
            </td>
            <td ng-controller="articleAuthorController">
                <div class="tag-border" ng-repeat="author in authors">
                    <a href="#">%%author.name%%</a><br>
                    <button class="close" data-toggle="modal" data-target="#delete-article-author"
                            ng-click="delete(author)">x
                    </button>
                </div>
            </td>
            <td ng-controller="articleTagController">
                <div class="tag-border" ng-repeat="tag in tags">
                    <a href="#">%%tag.name%%</a>
                    <button class="close" data-toggle="modal" data-target="#delete-article-tag"
                            ng-click="delete(tag)">x
                    </button>
                </div>
            </td>
            <td>
                {{--Preview--}}
                <button class="btn btn-primary btn-xs" data-toggle="modal"
                        data-target="#preview-article" ng-click="edit()">Preview
                </button>
                {{--Edit--}}
                <button class="btn btn-primary btn-xs" data-toggle="modal"
                        data-target="#update-article" ng-click="edit()">Edit
                </button>
                {{--Delete--}}
                <button class="btn btn-primary btn-xs" data-toggle="modal"
                        data-target="#delete-article" ng-click="delete()">Delete
                </button>
            </td>
        </tr>
        <tr ng-if="articles==null">
            <td colspan="6" class="empty-table">
                No articles is available.
                <a href="#" data-toggle="modal"
                   data-target="#create-article">Create a new one</a>.
            </td>
        </tr>
        </tbody>
    </table>
    <dir-pagination-controls></dir-pagination-controls>
</div>