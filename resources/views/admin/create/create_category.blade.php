@if(Auth::getUser()->admin || Auth::getUser()->author)
    <div class="modal fade" id="create-category" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="top: 150px" >
                <div class="modal-header">
                    <h5>Create Tag</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" id="name"
                               class="form-control" placeholder="Enter name tag...">
                    </div>
                    <span class="errors">* Not valid.</span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default"
                            data-dismiss="modal">
                        Cancel
                    </button>
                    <button class="btn btn-primary">
                        Create One
                    </button>
                    <button class="btn btn-primary">
                        Create More...
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
