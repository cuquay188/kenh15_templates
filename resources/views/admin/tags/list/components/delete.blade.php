@if(Auth::getUser()->is_admin() || Auth::getUser()->is_author())
    <div class="modal fade" role="dialog" id="delete-tag">
        <div class="modal-dialog">
            <div class="modal-content" style="top: 150px" ng-controller="deleteTagController">
                <div class="modal-header">
                    <h5 style="font-weight: bold">
                        Delete Tag: %%tag.name%%
                    </h5>
                    <div class="close" data-dismiss="modal">
                        <div class="glyphicon glyphicon-remove"></div>
                    </div>
                </div>
                <div class="modal-body">
                    <strong>Do you want to delete this tag?</strong>
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