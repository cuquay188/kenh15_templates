@extends('admin.layouts.master')
@section('title','Tags Management')
@section('content')
    <div class="tag-info" ng-controller="tagsListController">
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
                    <input type="text" class="form-control search" ng-model="tagFilter" placeholder="Search...">
                    <span><i class="glyphicon glyphicon-search"> </i></span>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th ng-click="sortType = 'name'; sortReverse=!sortReverse;" class="sortable" ng-class="{'sort': sortType=='name'}">
                    Name
                    <span ng-show="sortType == 'name' && !sortReverse"><i class="glyphicon glyphicon-sort-by-alphabet"></i></span>
                    <span ng-show="sortType == 'name' && sortReverse"><i class="glyphicon glyphicon-sort-by-alphabet-alt"></i></span>
                </th>
                <th ng-click="sortType = 'articles'; sortReverse=!sortReverse" class="sortable" ng-class="{'sort': sortType=='articles'}">
                    Article(s)
                    <span ng-show="sortType == 'articles' && !sortReverse"><i class="glyphicon glyphicon-sort-by-alphabet"></i></span>
                    <span ng-show="sortType == 'articles' && sortReverse"><i class="glyphicon glyphicon-sort-by-alphabet-alt"></i></span>
                </th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr dir-paginate="tag in tags | filter : tagFilter | itemsPerPage: itemsPerPage.item | orderBy:sortType:sortReverse "
                ng-controller="tagController">
                <td><a href="{{route('admin.tag')}}/%%tag.id%%">%%tag.name%%</a></td>
                <td>%%tag.articles%%</td>
                <td>
                    <button class="btn btn-primary btn-xs"
                            data-toggle="modal" data-target="#edit-tag"
                            ng-click="edit()">Edit
                    </button>
                    <button class="btn btn-primary btn-xs"
                            data-toggle="modal" data-target="#delete-tag"
                            ng-click="delete()">Delete
                    </button>
                </td>
            </tr>
            <tr ng-if="tags==null">
                <td colspan="6" class="empty-table">
                    No tags is available.
                    <a href="#" data-toggle="modal" data-target="#create-tag">Create a new one</a>.
                </td>
            </tr>
            </tbody>
        </table>
        <dir-pagination-controls></dir-pagination-controls>
        @include('admin.tags.list.components.edit')
        @include('admin.tags.list.components.delete')
    </div>
@endsection