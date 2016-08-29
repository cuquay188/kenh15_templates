@if(Auth::getUser()->is_admin())
    <div class="modal fade" id="create-author" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="top: 150px" ng-controller="createAuthorController">
                <div class="modal-header">
                    <h5 style="font-weight: bold">Promote new author</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="user">Pick a user to promote</label>
                        <select id="user" class="form-control"
                                ng-options="(x.label) for x in users"
                                ng-model="user"
                                ng-class="{'error' : userError}">
                            <option style="font-weight:bold;">--Select an user--</option>
                        </select>
                        <span class="errors">%%userError%%</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" ng-click="dismiss()"
                            data-dismiss="modal">
                        Cancel
                    </button>
                    <button class="btn btn-primary" ng-click="submit()">
                        Promote One
                    </button>
                    <button class="btn btn-primary" ng-click="submit(1)">
                        Promote More...
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
