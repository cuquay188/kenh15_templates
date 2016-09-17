<div class="modal fade" role="dialog" id="delete-article-tag">
    <div class="modal-dialog" style="top: 150px">
        <div class="modal-content" ng-controller="deleteArticleTagController">
            <div class="modal-header">
                <h5 style="font-weight: bold">Remove tag: %%tag.name%%</h5>
                <div class="close" data-dismiss="modal">
                    <div class="glyphicon glyphicon-remove"></div>
                </div>
            </div>
            <div class="modal-body">
                <p>Do you want to remove this tag?</p>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <div class="form-group">
                        <button class="btn btn-default"
                                data-dismiss="modal">
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
</div>