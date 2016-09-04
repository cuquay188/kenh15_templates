@if(Auth::getUser()->is_admin() || Auth::getUser()->is_author())
    <div class="modal fade" role="dialog" id="update-category">
        <div class="modal-dialog">
            <div class="modal-content" style="top: 150px" ng-controller="editCategoryController">
                <div class="modal-header">
                    <h5>
                        Edit Category: %%category.name%%
                    </h5>
                    <div class="close" data-dismiss="modal">
                        <div class="glyphicon glyphicon-remove"></div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="text" id="name"
                               ng-keyup="$event.keyCode == 13 && submit()" autocomplete="off"
                               ng-model="category.newName" ng-class="{'error' : nameErrors}"
                               placeholder="New tag name...">
                        <span class="errors">%%nameErrors%%</span>
                    </div>
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
@endif