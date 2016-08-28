<div class="modal fade" id="edit-article" role="dialog">
    <div class="modal-dialog wide">
        <div class="modal-content">
            <div class="modal-header">
                <h5>
                    <strong>Edit article:</strong>
                    <span></span>
                </h5>
                <div class="close" data-dismiss="modal">
                    <div class="glyphicon glyphicon-remove"></div>
                </div>
            </div>
            <div class="modal-body">
                <div class="col col-sm-7">
                    <div class="form-group">
                        <textarea id="content" class="ckeditor form-control"></textarea>
                    </div>
                </div>
                <div class="col col-sm-5">
                    <div class="form-group" style="width: 100%">
                        <input type="text" class="form-control" id="title"
                               value="" placeholder="Enter title...">
                    </div>

                    <div class="form-group">
                        <label>Tags</label>
                        <div id="edit_tags" class="checkbox-style row">
                            <label for="edit-tag-1"
                                   class="col col-sm-4">
                                <input id="edit-tag-1" type="checkbox" value="1">
                                1
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit-category-1">Category</label>
                        <select id="edit-category-1" class="form-control">
                            <option value="null" style="font-weight: bold">--Select a category--</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Choose Author(s)</label>
                        <div id="edit-authors" class="checkbox-style row">
                                <label for="edit-author-1" class="col col-sm-6">
                                    <input type="checkbox" id="edit-author-1" value="1">
                                    1
                                </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group" id="action">
                    <button type="submit" class="btn btn-primary ">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>