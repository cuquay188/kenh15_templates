<div class="modal fade" role="dialog" id="delete-article">
    <div class="modal-dialog">
        <div class="modal-content" style="top: 150px" ng-controller="deleteArticleController">
            <div class="modal-header">
                <h5 style="font-weight: bold">
                    Delete Article: %%article.shorten_title%%
                </h5>
            </div>
            <div class="modal-body">
                <strong>Do you want to delete this article?</strong>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <button class="btn btn-default" ng-click="dismiss()"
                            data-dismiss="modal">
                        Cancel
                    </button>
                    <button class="btn btn-primary" ng-click="submit()">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>