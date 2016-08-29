@if(Auth::getUser()->is_admin() || Auth::getUser()->is_author())
    <div class="modal fade" id="create-tag" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="top: 150px" ng-controller="createTagController">
                <div class="modal-header">
                    <h5 style="font-weight: bold">Create new tag</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" id="name" ng-model="tagName" ng-class="{'error' : nameErrors}"
                               ng-keyup="$event.keyCode == 13 && create(1)"
                               class="form-control" placeholder="Enter name tag...">
                        <span class="errors">%%nameErrors%%</span>
                    </div>
                </div>
                <div class="modal-footer">
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
@endif
