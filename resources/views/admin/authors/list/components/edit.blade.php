<div class="modal fade" role="dialog" id="edit-author">
    <div class="modal-dialog">
        <div class="modal-content" style=" top: 90px">
            <div class="modal-header">
                <h5 style="font-weight: bold">Edit Author: "<span
                            style="font-style: italic">Pham Van Tri</span>"</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"
                           value="" placeholder="Enter name...">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address"
                           value=""
                           placeholder="Enter address...">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age"
                           value="" placeholder="Enter age...">
                </div>
                <div class="form-group">
                    <label for="tel">Phone</label>
                    <input type="tel" class="form-control" name="tel" id="tel"
                           value="" placeholder="Enter phone...">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" name="email" id="email"
                           value=""
                           placeholder="Enter email...">
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