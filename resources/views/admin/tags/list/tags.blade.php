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
        <div class="modal fade" role="dialog" id="edit-tag">
            <div class="modal-dialog">
                <div class="modal-content" style="top: 150px" ng-controller="editTagController">
                    <div class="modal-header">
                        <h5>Edit Tag: %%tag.name%%
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" type="text" id="name"
                                   ng-keyup="$event.keyCode == 13 && submit()"
                                   ng-model="tag.newName" ng-class="{'error' : nameErrors}"
                                   placeholder="New tag name...">
                        </div>
                        <span class="errors">%%nameErrors%%</span>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal" ng-click="dismiss()">
                                Cancel
                            </button>
                            <button class="btn btn-primary"
                                    ng-click="submit()">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" role="dialog" id="delete-tag">
            <div class="modal-dialog">
                <div class="modal-content" style="top: 150px" ng-controller="deleteTagController">
                    <div class="modal-header">
                        <h5 style="font-weight: bold">Delete Tag: %%tag.name%%</h5>
                    </div>
                    <div class="modal-body">
                        <strong>Do you want to delete this tag?</strong>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button class="btn btn-default"
                                    data-dismiss="modal" ng-click="dismiss()">
                                Cancel
                            </button>
                            <button class="btn btn-primary"
                                    ng-click="submit()">
                                Confirm
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection