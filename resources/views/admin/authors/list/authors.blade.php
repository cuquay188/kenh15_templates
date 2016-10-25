@extends('admin.layouts.components.management')
@section('header','Authors Management')
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
            <input type="text" class="form-control search" ng-model="authorFilter" placeholder="Search...">
            <span><i class="glyphicon glyphicon-search"> </i></span>
        </div>
    </div>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th th-sortable sort-by="name" title="Name" width="200px"></th>
        <th th-sortable sort-by="age" title="Age" width="75px"></th>
        <th>Address</th>
        <th ng-if="auth.is_admin">Phone</th>
        <th ng-if="auth.is_admin" th-sortable sort-by="email" title="Email" width="150px"></th>
        <th style="width:175px;">Action</th>
    </tr>
    </thead>
    <tbody>
    <tr dir-paginate="author in authors | filter: authorFilter | itemsPerPage: itemsPerPage.item | orderBy:sortType:sortReverse"
        ng-controller="authorController">
        <td><a href="#">%%author.name%%</a></td>
        <td>%%author.age%%</td>
        <td>
            <div ng-if="auth.is_admin">
                %%author.address + ( author.city ? (', ' + author.city) : '' )%%
            </div>
            <div ng-if="!auth.is_admin">
                %%author.city%%
            </div>
        </td>
        <td ng-if="auth.is_admin">%%author.tel%%</td>
        <td ng-if="auth.is_admin"><a href="#" ng-bind="author.email"></a></td>
        <td>
            {{--Edit Function--}}
            <button ng-if="author.email != auth.email || auth.is_admin"
                    type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                    ng-disabled="!auth.is_admin"
                    data-target="#update-author" ng-click="edit()">Update Info
            </button>
            <a  ng-if="author.email == auth.email && !auth.is_admin" style="color: #fff" 
                href="#profile" class="btn btn-primary btn-xs">Update Info</a>

            {{--Delete Function--}}
            <button type="submit" class="btn btn-danger btn-xs" data-toggle="modal"
                    ng-disabled="!auth.is_admin"
                    data-target="#delete-author" ng-click="delete()">Demote
            </button>
        </td>
    </tr>
    </tbody>
</table>
<div ng-if="authors.length==0" class="empty-list">
    <td class="empty-table">
        No authors is available. You need to
        <a data-toggle="modal" data-target="#create-author">promote a user</a>.
    </td>
</div>
<dir-pagination-controls  ng-if="authors.length!=0">
@endsection