<div class="modal fade" role="dialog" id="delete-article-author"
     style="top: 150px">
    <div class="modal-dialog">
        <div class="modal-content" ng-controller="deleteArticleAuthorController">
            <div class="modal-header">
                <h5 style="font-weight: bold">Remove author: %%author.name%%</h5>
            </div>
            <div class="modal-body">
                <strong>Do you want to remove this author?</strong>
            </div>
            <div class="modal-footer">
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