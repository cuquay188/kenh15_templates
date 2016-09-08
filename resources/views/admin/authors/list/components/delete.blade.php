@if(Auth::user()->is_admin())
    <div class="modal fade" role="dialog" id="delete-author">
        <div class="modal-dialog">
            <div class="modal-content" style="top: 150px" ng-controller="deleteAuthorController">
                <div class="modal-header">
                    <h5 style="font-weight: bold">
                        Demote %%author.name%%
                    </h5>
                    <div class="close" data-dismiss="modal">
                        <div class="glyphicon glyphicon-remove"></div>
                    </div>
                </div>
                <div class="modal-body">
                    <strong>Do you want to demote this author?</strong>
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