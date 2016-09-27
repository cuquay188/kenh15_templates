@extends('admin.layouts.components.management')
@section('header','Articles Management')
@section('body')
<div class="row">
    <div class="col col-lg-1 col-sm-2">
        <div class="form-group">
            <select class="form-control tooltip-toggle" ng-model="itemsPerPage.item" ng-options="x for x in itemsPerPage.items">
            </select>
            <span data-top="40" data-width="175">
                Number of items each page
            </span>
        </div>
    </div>
    <div class="col col-lg-6 col-sm-3">
    </div>
    <div class="col col-lg-2 col-sm-2">
        <!-- <div class="form-group">
            <button class="btn btn-toggle btn-block tooltip-toggle btn-default">
                Show your Article(s)
            </button>
            <span data-top="40" data-width="inherit">
                Click to show only your article(s)
            </span>
        </div> -->
    </div>
    <div class="col col-lg-3 col-sm-5">
        <div class="form-group">
            <input class="form-control search" ng-model="articleFilter" placeholder="Search..." type="text">
                <span>
                    <i class="glyphicon glyphicon-search">
                    </i>
                </span>
            </input>
        </div>
    </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th th-sortable sort-by="title" title="Title" width="250px"></th>
            <th th-sortable sort-by="category.name" title="Category" width="120px"></th>
            <th th-sortable sort-by="updated_at" title="Last updated" width="140px"></th>
            <th>Author</th>
            <th>Tags</th>
            <th style="width:200px;">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr dir-paginate="article in articles | filter : articleFilter | orderBy:sortType:sortReverse | itemsPerPage: itemsPerPage.item " ng-controller="articleController">
            <td>
                <a class="tooltip-toggle tooltip-block" data-target="#preview-article" data-toggle="modal" ng-click="edit()">
                    %%article.title | shorten:25%%
                </a>
                <span>
                    <h6>
                        %%article.title%%
                        <br/>
                    </h6>
                </span>
            </td>
            <td ng-controller="articleCategoryController">
                <a>
                    %%article.category.name%%
                </a>
            </td>
            <td style="text-align: center">
                %%article.updated_at | datetime:'date'%%
                <br>
                    %%article.updated_at | datetime:'time'%%
                </br>
            </td>
            <td ng-controller="articleAuthorController">
                <div class="tag-border" ng-repeat="author in authors">
                    <a>
                        %%author.name%%
                    </a>
                    <button class="close" data-target="#delete-article-author" data-toggle="modal" ng-click="delete(author)">
                        x
                    </button>
                </div>
            </td>
            <td ng-controller="articleTagController">
                <div class="tag-border" ng-repeat="tag in tags">
                    <a>
                        %%tag.name%%
                    </a>
                    <button class="close" data-target="#delete-article-tag" data-toggle="modal" ng-click="delete(tag)">
                        x
                    </button>
                </div>
            </td>
            <td>
                {{--Preview--}}
                <button class="btn btn-primary btn-xs" data-target="#preview-article" data-toggle="modal" ng-click="edit()">
                    Preview
                </button>
                {{--Edit--}}
                <button class="btn btn-primary btn-xs" data-target="#update-article" data-toggle="modal" ng-click="edit()">
                    Edit
                </button>
                {{--Delete--}}
                <button class="btn btn-danger btn-xs" data-target="#delete-article" data-toggle="modal" ng-click="delete()">
                    Delete
                </button>
            </td>
        </tr>
        <tr ng-if="articles.length==0">
            <td class="empty-table" colspan="6">
                No articles is available.
                <a data-target="#create-article" data-toggle="modal">
                    Create a new one
                </a>
                .
            </td>
        </tr>
    </tbody>
</table>
<dir-pagination-controls  ng-if="articles.length!=0">
</dir-pagination-controls>
@endsection
@section('scripts')
<script>
    $('span').each(function() {
        $(this).css({
            'width': $(this).data('width'),
            'top': $(this).data('top')
        });
    });
</script>
@endsection