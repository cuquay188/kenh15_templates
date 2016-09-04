<div class="modal fade" role="dialog" id="update-author">
    <div class="modal-dialog">
        <div class="modal-content" style=" top: 50px" ng-controller="editAuthorController">
            <div class="modal-header">
                <h5 style="font-weight: bold">
                    Edit Author: %%author.name%%
                </h5>
                <div class="close" data-dismiss="modal">
                    <div class="glyphicon glyphicon-remove"></div>
                </div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"
                           ng-model="author.newName"
                           placeholder="Enter new name..."
                           ng-class="{'error' : nameErrors}">
                    <span class="errors">%%nameErrors%%</span>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address"
                           ng-model="author.newAddress"
                           placeholder="01 Layana .Str..."
                           ng-class="{'error' : addressErrors}">
                    <span class="errors">%%addressErrors%%</span>
                </div>
                <div class="form-group">
                    <label for="address">City</label>
                    <input type="text" class="form-control" id="address"
                           ng-model="author.newCity"
                           placeholder="Da Nang city..."
                           ng-class="{'error' : cityErrors}">
                    <span class="errors">%%cityErrors%%</span>
                </div>
                <div class="form-group">
                    <label for="birth">Birth</label>
                    <input type="text" class="form-control" id="birth"
                           placeholder=""
                           ng-class="{'error' : birthErrors}">
                    <span class="errors">%%birthErrors%%</span>
                </div>
                <div class="form-group">
                    <label for="tel">Phone</label>
                    <input type="tel" class="form-control" id="tel"
                           ng-model="author.newTel"
                           placeholder="+84165...."
                           ng-class="{'error' : telErrors}">
                    <span class="errors">%%telErrors%%</span>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
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