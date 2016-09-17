<div class="modal fade" role="dialog" id="delete-article">
    <div class="modal-dialog" style="top: 150px">
        <div class="modal-content" ng-controller="deleteArticleController">
            <div class="modal-header">
                <h5 style="font-weight: bold">
                    Delete Article:
                    %%article.title | shorten:40%%
                </h5>
                <div class="close" data-dismiss="modal">
                    <div class="glyphicon glyphicon-remove"></div>
                </div>
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
                    <button class="btn btn-danger" ng-click="submit()">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>