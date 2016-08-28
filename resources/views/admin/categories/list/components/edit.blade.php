<div class="modal fade" role="dialog" id="edit-category">
    <div class="modal-dialog">
        <div class="modal-content" style="top: 150px" ng-controller="editCategoryController">
            <div class="modal-header">
                <h5>
                    Edit Category: %%category.name%%
                </h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control" type="text" id="name"
                           ng-keyup="$event.keyCode == 13 && submit()"
                           ng-model="category.newName" ng-class="{'error' : nameErrors}"
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