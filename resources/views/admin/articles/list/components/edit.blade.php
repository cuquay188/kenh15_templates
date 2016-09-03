<div class="modal fade" id="edit-article" role="dialog">
    <div class="modal-dialog wide">
        <div class="modal-content" ng-controller="editArticleController">
            <div class="modal-header">
                <h5>
                    <strong>Edit article: %%article.title%%</strong>
                </h5>
                <div class="close" data-dismiss="modal" ng-click="dismiss()">
                    <div class="glyphicon glyphicon-remove"></div>
                </div>
            </div>
            <div class="modal-body">
                <div class="col col-sm-7">
                    <div class="form-group">
                        <textarea name="edit_article"
                                  class="ckeditor form-control"></textarea>
                    </div>
                </div>
                <div class="col col-sm-5">
                    <div class="form-group" style="width: 100%">
                        <textarea class="form-control" id="title"
                                  ng-model="title" placeholder="Enter title...">
                        </textarea>
                        <span class="error"></span>
                    </div>
                    <div class="form-group">
                        <label>Tags</label>
                        <div class="checkbox-style row">
                            <label for="edit-tag-%%tag.id%%"
                                   class="col col-sm-4"
                                   ng-repeat="(i,tag) in tags">
                                <input id="edit-tag-%%tag.id%%" type="checkbox" ng-model="tags[i].checked">
                                %%tag.name%%
                            </label>
                        </div>
                        <span class="error"></span>
                    </div>
                    <div class="form-group">
                        <label for="edit-category">Category</label>
                        <select id="edit-category" class="form-control"
                                ng-options="category.id as category.name for category in categories"
                                ng-model="category">
                        </select>
                        <span class="error"></span>
                    </div>
                    <div class="form-group">
                        <label>Choose Author(s)</label>
                        <div class="checkbox-style row">
                            <label for="edit-author-%%author.id%%"
                                   class="col col-sm-6"
                                   ng-repeat="(i,author) in authors">
                                <input type="checkbox" id="edit-author-%%author.id%%" ng-model="authors[i].checked">
                                %%author.name%%
                            </label>
                        </div>
                        <span class="error"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group" id="action">
                    <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="dismiss()">Close
                    </button>
                    <button type="submit" class="btn btn-primary" ng-click="submit()">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>