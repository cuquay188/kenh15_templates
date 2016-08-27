@extends('admin.layouts.master')
@section('title','Categories Management')
@section('content')
    <div class="category-info">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Category</th>
                <th>Article(s)</th>
                <th style="width:30%;">Hot</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr style="font-size: 13px">
                <td><a href="#"></a></td>
                <td></td>
                <td>
                    <button class="btn btn-xs btn-toggle hot btn-default"></button>
                    <button class="btn btn-xs btn-toggle header btn-default">
                        Header
                    </button>
                </td>
                <td>
                    {{--Edit Function--}}
                    <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                            data-target="#edit-category">Edit
                    </button>
                    {{--Delete Function--}}
                    <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                            data-target="#delete-category">Delete
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="empty-table">
                    No categories is available.
                    <a href="#" data-toggle="modal" data-target="#create-category">Create a new one</a>.
                </td>
            </tr>
            </tbody>
        </table>
        <div class="modal fade" role="dialog" id="edit-category">
            <div class="modal-dialog">
                <div class="modal-content" style="top: 150px">
                    <div class="modal-header">
                        <h5>Edit Category:</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" value="" id="name"
                                   class="form-control" placeholder="Enter name...">
                        </div>
                        <span class="errors">* Not Valid</span>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group" id="action">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">
                                Cancel
                            </button>
                            <button class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" role="dialog" id="delete-category">
            <div class="modal-dialog">
                <div class="modal-content" style="top: 150px">
                    <div class="modal-header">
                        <h5>Delete Category: </h5>
                    </div>
                    <div class="modal-body">
                        <strong>Do you want to delete this category?</strong>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button class="btn btn-default"
                                    data-dismiss="modal">
                                Cancel
                            </button>
                            <button class="btn btn-primary">
                                Confirm
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection