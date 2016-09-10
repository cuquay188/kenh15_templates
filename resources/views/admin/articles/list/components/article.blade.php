<div class="modal fade" id="preview-article" role="dialog">
    <div class="modal-dialog wide">
        <div class="modal-content" ng-controller="editArticleController">
            <div class="modal-header">
                <a class="btn btn-success" href="{{route('homepage')}}/article/%%article.url%%" target="_blank">
                    Preview on Homepage
                </a>
                <h5 style="margin-left: 180px">
                    %%article.title%%
                </h5>
                <div class="close" data-dismiss="modal" ng-click="dismiss()">
                    <div class="glyphicon glyphicon-remove">
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="container" ng-bind-html="article.content">
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <button class="btn btn-default" data-dismiss="modal" ng-click="dismiss()">
                        Close
                    </button>
                    <button class="btn btn-danger" data-dismiss="modal" data-target="#delete-article" data-toggle="modal">
                        Remove this article
                    </button>
                    <button class="btn btn-primary" data-dismiss="modal" data-target="#update-article" data-toggle="modal">
                        Edit this article
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>