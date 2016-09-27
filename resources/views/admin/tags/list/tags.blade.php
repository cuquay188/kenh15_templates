@extends('admin.layouts.components.management')
@section('header','Tags Management')
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
                <input type="text" class="form-control search" ng-model="tagFilter" placeholder="Search...">
                <span><i class="glyphicon glyphicon-search"> </i></span>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th th-sortable sort-by="name" title="Name" width="250px"></th>
            <th th-sortable sort-by="articles" title="Article(s)" width="150px"></th>
            <th style="width:200px;">Action</th>
            <th>Note</th>
        </tr>
        </thead>
        <tbody>
        <tr dir-paginate="tag in tags | filter : tagFilter | orderBy:sortType:sortReverse | itemsPerPage: itemsPerPage.item"
            ng-controller="tagController">
            <td><a href="{{route('admin.tag')}}/%%tag.id%%">%%tag.name%%</a></td>
            <td class="center">%%tag.articles%%</td>
            <td>
                <button class="btn btn-primary btn-xs"
                        data-toggle="modal" data-target="#update-tag"
                        {{Auth::getUser()->is_admin() || Auth::getUser()->is_author() ? "" : "disabled"}}
                        ng-click="edit()">Edit
                </button>
                <button class="btn btn-danger btn-xs"
                        data-toggle="modal" data-target="#delete-tag"
                        {{Auth::getUser()->is_admin() || Auth::getUser()->is_author() ? "" : "disabled"}}
                        ng-click="delete()">Delete
                </button>
            </td>
            <td>%%tag.note%%</td>
        </tr>
        <tr ng-if="tags.length==0">
            <td colspan="6" class="empty-table">
                No tags is available.
                <a data-toggle="modal" data-target="#create-tag">
                    Create a new one
                </a>
                .
            </td>
        </tr>
        </tbody>
    </table>
    <dir-pagination-controls ng-if="tags.length!=0">
    </dir-pagination-controls>
@endsection