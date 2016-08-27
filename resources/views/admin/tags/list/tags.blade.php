@extends('admin.layouts.master')
@section('title','Tags Management')
@section('content')
    <div class="tag-info" ng-controller="tagsListController">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Article(s)</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="tag in tags" ng-controller="tagController">
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
        <div class="modal fade" role="dialog" id="edit-tag">
            <div class="modal-dialog">
                <div class="modal-content" style="top: 150px" ng-controller="editTagController">
                    <div class="modal-header">
                        <h5 style="font-weight: bold">Edit Tag: %%tag.name%%
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
                        <div class="form-group" id="action">
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
@endsection