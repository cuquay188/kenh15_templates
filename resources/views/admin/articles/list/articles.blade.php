@extends("admin.layouts.master")
@section("title",'Articles Management')
@section('scripts')
    <script type="text/javascript" src="{{asset('/ckeditor/ckeditor.js')}}"></script>
@endsection
@section("content")
    <div class="article-list" ng-controller="articlesListController">
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
                <th style="">Author</th>
                <th style="">Tags</th>
                <th style="width:200px;">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr dir-paginate="article in articles| filter : articleFilter | orderBy:sortType:sortReverse | itemsPerPage: itemsPerPage.item  "
                ng-controller="articleController">
                <td>
                    <a href="{{route('admin.article')}}/%%article.url%%" class="tooltip-toggle">
                        <span>
                            <h6>%%article.title%%<br></h6>
                            <p ng-bind="article.shorten_content"></p>
                        </span>
                        %%article.shorten_title%%
                    </a>
                </td>
                <td>
                    <a href="#">
                        %%article.category.name%%
                    </a>
                </td>
                <td style="text-align: center">
                    %%article.updated_at | date%% <br>
                    %%article.updated_at | time%%
                </td>
                <td>
                    <div class="tag-border" ng-repeat="author in article.authors">
                        <a href="#">%%author.name%%</a><br>
                        <button class="close" data-toggle="modal" data-target="#delete-article-author">x
                        </button>
                    </div>
                </td>
                <td>
                    <div class="tag-border" ng-repeat="tag in article.tags">
                        <a href="#">%%tag.name%%</a>
                        <button class="close" data-toggle="modal" data-target="#delete-article-tag">x
                        </button>
                    </div>
                </td>
                <td>
                    {{--Preview--}}
                    <a href="#" class="btn btn-primary btn-xs">Preview</a>
                    {{--Edit--}}
                    <button class="btn btn-primary btn-xs" data-toggle="modal"
                            data-target="#edit-article">Edit
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
@endsection
@section('dialogs')
    @include("admin.articles.list.components.edit")
    @include("admin.articles.list.components.delete.article")
    @include("admin.articles.list.components.delete.authors")
    @include("admin.articles.list.components.delete.tags")
@endsection