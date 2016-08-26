@extends('admin.layouts.master')
@section('title','Tags Management')
@section('content')
    <div class="tag-info" ng-controller="tagsListController">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="tag in tags" ng-controller="tagController">
                <td><a href="{{route('admin.tag')}}/%%tag.id%%">%%tag.name%%</a></td>
                <td>
                    <button class="btn btn-primary btn-xs"
                            data-toggle="modal" data-target="#edit_tag"
                            ng-click="edit()">Edit
                    </button>
                    <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal">Delete
                    </button>
                </td>
            </tr>
            <tr ng-if="tags==null">
                <td colspan="6" class="empty-table">
                    No tags is available.
                    <a href="{{route('create_category')}}">Create a new one</a>.
                </td>
            </tr>
            </tbody>
        </table>
        <div>
            <div class="modal fade" role="dialog" id="edit_tag">
                <div class="modal-dialog">
                    <div class="modal-content" style="top: 150px" ng-controller="editTagController">
                        <div class="modal-header">
                            <h5 style="font-weight: bold">Edit Tag: %%tag.name%%
                            </h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control" type="text"
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
                                <button type="submit" class="btn btn-warning"
                                        ng-click="submit()">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" role="dialog" id="delete">
                <div class="modal-dialog">
                    <div class="modal-content" style="top: 150px">
                        <div class="modal-header">
                            <h5 style="font-weight: bold">Delete Category: "<span
                                        style="font-style: italic"></span>"</h5>
                        </div>
                        <div class="modal-body">
                            <p>Do you want to delete this tag?</p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{route('post_delete_tag')}}" method="post">
                                <input type="hidden" value="" name="tag_id">
                                <input type="hidden" value="{{Session::token()}}" name="_token">
                                <button type="submit" class="btn btn-warning">Confirm</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Cancel
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('body.scripts')
    <script src="{{asset('js/admin/tags/services.js')}}"></script>
    <script src="{{asset('js/admin/tags/controllers.js')}}"></script>
@endsection