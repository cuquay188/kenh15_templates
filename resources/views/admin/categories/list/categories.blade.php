@extends('admin.layouts.components.management')
@section('header','Categories Management')
@section('body')
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
        <th th-sortable sort-by="name" title="Name" width="200px"></th>
        <th th-sortable sort-by="articles" title="Article(s)" width="125px"></th>
        <th th-sortable sort-by="advance.is_hot+advance.is_header" title="Hot" width="200px"></th>
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
                    ng-disabled="!auth.is_admin"
                    ng-class="{'btn-default':!category.advance.is_hot,'btn-primary':category.advance.is_hot}"></button>
            <button class="btn btn-xs btn-toggle" ng-click="setHeader()"
                    ng-disabled="!auth.is_admin"
                    ng-show="category.advance.is_hot"
                    ng-class="{'btn-default':!category.advance.is_header,'btn-primary':category.advance.is_header}">
                Show to header
            </button>
        </td>
        <td>
            {{--Edit Function--}}
            <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                    data-target="#update-category"
                    ng-disabled="!auth.is_admin"
                    ng-click="edit()">Edit
            </button>
            {{--Delete Function--}}
            <button type="submit" class="btn btn-danger btn-xs" data-toggle="modal"
                    data-target="#delete-category"
                    ng-disabled="!auth.is_admin"
                    ng-click="delete()">Delete
            </button>
        </td>
        <td>%%category.note%%</td>
    </tr>
    </tbody>
</table>
<div ng-if="categories.length==0" class="empty-list">
    <td class="empty-table">
        No categories is available.
        <a data-toggle="modal" data-target="#create-category">
            Create a new one
        </a>
        .
    </td>
</div>
<dir-pagination-controls ng-if="categories.length!=0">
@endsection