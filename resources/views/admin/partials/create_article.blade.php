@if(Auth::getUser()->is_admin() || Auth::getUser()->is_author())
    <div class="modal fade" id="create-article" role="dialog">
        <div class="modal-dialog wide">
            <div class="modal-content" ng-controller="createArticleController">
                <div class="modal-header">
                    <h5><strong>Create new article</strong></h5>
                    <div class="close" data-dismiss="modal">
                        <div class="glyphicon glyphicon-remove"></div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="col col-sm-7">
                        <div class="form-group">
                            <textarea name="create_article"
                                      class="ckeditor form-control"
                                      ng-class="{'error' : errors.content}"></textarea>
                            <span class="errors">%%errors.content[0]%%</span>
                        </div>
                    </div>
                    <div class="col col-sm-5">
                        <div class="form-group" style="width: 100%">
                            <input type="text" class="form-control" id="title"
                                   ng-model="title" placeholder="Enter title...">
                            <span class="errors">%%errors.title[0]%%</span>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <div id="edit_tags" class="checkbox-style row">
                                <label for="edit-tag-%%tag.id%%"
                                       class="col col-sm-4"
                                       ng-repeat="(i,tag) in tags">
                                    <input id="edit-tag-%%tag.id%%" type="checkbox" ng-model="tags[i].checked">
                                    %%tag.name%%
                                </label>
                            </div>
                            <span class="errors">%%errors.tags[0]%%</span>
                        </div>
                        <div class="form-group">
                            <label for="edit-category">Category</label>
                            <select id="edit-category" class="form-control"
                                    ng-model="category"
                                    ng-options="category.id as category.name for category in categories">
                            </select>
                            <span class="errors">%%errors.category[0]%%</span>
                        </div>
                        <div class="form-group">
                            <label>Choose Author(s)</label>
                            <div id="edit-authors" class="checkbox-style row">
                                <label for="edit-author-%%author.id%%"
                                       class="col col-sm-6"
                                       ng-repeat="(i,author) in authors">
                                    <input type="checkbox" id="edit-author-%%author.id%%" ng-model="authors[i].checked">
                                    %%author.name%%
                                </label>
                            </div>
                            <span class="errors">%%errors.authors[0]%%</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button class="btn btn-default"
                                data-dismiss="modal">
                            Cancel
                        </button>
                        <button class="btn btn-primary" ng-click="submit()">
                            Create One
                        </button>
                        <button class="btn btn-primary" ng-click="submit(1)">
                            Create More...
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif