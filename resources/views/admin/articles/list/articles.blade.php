@extends("admin.layouts.master")
@section("title",'Articles Management')
@section('scripts')
    <script type="text/javascript" src="{{asset('/ckeditor/ckeditor.js')}}"></script>
@endsection
@section("content")
    <div class="article-list">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="width:250px;text-align: center;">Title</th>
                <th style="width:100px;">Category</th>
                <th style="width:120px;text-align: center;">Last Update</th>
                <th style="">Author</th>
                <th style="">Tags</th>
                <th style="width:200px;">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr style="font-size: 13px">
                <td id="title">
                    <a title="" href="">

                    </a>
                </td>
                <td id="category">
                    <a href="#">
                        Xếp hình
                    </a>
                </td>
                <td style="text-align: center">
                    Chủ nhật ngày 13
                </td>
                <td id="authors">
                    <div class="tag-border">
                        <a href="#">Pham Van Tri</a><br>
                        <button type="submit" class="close" data-toggle="modal" data-target="#delete-article-author">x
                        </button>
                    </div>
                </td>
                <td id="tags">
                    <div class="tag-border">
                        <a href="#" >Hot</a>
                        <button type="submit" class="close" data-toggle="modal" data-target="#delete-article-tag">x
                        </button>
                    </div>
                </td>
                <td>
                    {{--Preview--}}
                    <a href="#" class="btn btn-primary btn-xs">Preview</a>
                    {{--Edit--}}
                    <button class="btn btn-primary btn-xs" data-toggle="modal"
                            data-target="#edit-article">Edit
                    </button>
                    {{--Delete--}}
                    <button class="btn btn-primary btn-xs" data-toggle="modal"
                            data-target="#delete-article">Delete
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="empty-table">
                    No articles is available.
                    <a href="#" data-toggle="modal"
                       data-target="#create-article">Create a new one</a>.
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('dialogs')
    @include("admin.articles.list.components.edit")
    @include("admin.articles.list.components.delete.article")
    @include("admin.articles.list.components.delete.authors")
    @include("admin.articles.list.components.delete.tags")
@endsection