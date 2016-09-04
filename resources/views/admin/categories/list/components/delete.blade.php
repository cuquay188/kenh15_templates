@if(Auth::getUser()->is_admin() || Auth::getUser()->is_author())
    <div class="modal fade" role="dialog" id="delete-category">
        <div class="modal-dialog">
            <div class="modal-content" style="top: 150px" ng-controller="deleteCategoryController">
                <div class="modal-header">
                    <h5>Delete Category: %%category.name%%</h5>
                </div>
                <div class="modal-body">
                    <strong>Do you want to delete this category?</strong>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button class="btn btn-default"
                                data-dismiss="modal" ng-click="dismiss()">
                            Cancel
                        </button>
                        <button class="btn btn-danger"
                                ng-click="submit()">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif