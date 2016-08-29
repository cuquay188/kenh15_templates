@if(Auth::getUser()->is_admin())
    <div class="modal fade" id="create-author" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="top: 150px">
                <div class="modal-header">
                    <h5 style="font-weight: bold">Promote new author</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="user">Pick a user to promote</label>
                        <select name="user" id="user" class="form-control">
                            <option value="" style="font-weight:bold;">--Select an user--</option>
                            <option value="1">admin - pvtri96@gmail.com</option>
                        </select>
                    </div>
                    <span class="errors"></span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default"
                            data-dismiss="modal">
                        Cancel
                    </button>
                    <button class="btn btn-primary" ng-click="create()">
                        Promote One
                    </button>
                    <button class="btn btn-primary" ng-click="create(1)">
                        Promote More...
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
