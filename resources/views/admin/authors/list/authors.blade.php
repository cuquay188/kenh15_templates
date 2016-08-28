@extends("admin.layouts.master")
@section("title", "Authors Management")
@section("content")
    <div class="authors-info">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="width:150px;">Name</th>
                <th>Address</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Email</th>
                <th style="width:200px;">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><a href="#">Pham Van Tri</a></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    {{--Edit Function--}}
                    <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                            data-target="#edit-author">Update Info
                    </button>

                    {{--Delete Function--}}
                    <button type="submit" class="btn btn-primary btn-xs" data-toggle="modal"
                            data-target="#delete-author">Demote
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="empty-table">
                    No authors is available. You need to
                    <a href="#" data-toggle="modal" data-target="#create-author">promote a user.</a>.
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('dialogs')
    @include("admin.authors.list.components.edit")
    @include("admin.authors.list.components.delete")
@endsection