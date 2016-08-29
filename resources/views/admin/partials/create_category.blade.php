@if(Auth::getUser()->is_admin() || Auth::getUser()->is_author())
    <div class="modal fade" id="create-category" role="dialog">
        <div class="modal-dialog modal-sm" style="margin:0;">
            <div class="modal-content" ng-controller="createCategoryController">
                <div class="modal-header">
                    <h5>Create new category</h5>
                    <div class="close" data-dismiss="modal">
                        <div class="glyphicon glyphicon-remove"></div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" id="name" ng-model="newName" ng-class="{'error' : nameErrors}"
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
                        Create
                    </button>
                    <button class="btn btn-primary" ng-click="submit(1)">
                        Create more
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
