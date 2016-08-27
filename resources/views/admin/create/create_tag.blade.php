@if(Auth::getUser()->admin || Auth::getUser()->author)
    <div class="modal fade" id="create-tag" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="top: 150px" ng-controller="createTagController">
                <div class="modal-header">
                    <h5 style="font-weight: bold">Create Tag</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" id="name" ng-model="tagName" ng-class="{'error' : nameErrors}"
                               ng-keyup="$event.keyCode == 13 && create(1)"
                               class="form-control" placeholder="Enter name tag...">
                    </div>
                    <span class="errors">%%nameErrors%%</span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default"
                            data-dismiss="modal">
                        Cancel
                    </button>
                    <button class="btn btn-primary" ng-click="create()">
                        Create One
                    </button>
                    <button class="btn btn-primary" ng-click="create(1)">
                        Create More...
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
