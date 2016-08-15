<div class="modal fade" id="delete{{$article->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="top: 150px;">
            <div class="modal-header">
                <h5 style="font-weight: bold">Delete Article: "<span
                            style="font-style: italic">{{$article->title}}</span>"</h5>
            </div>
            <div class="modal-body">
                <p>Do you want to delete this article?</p>
            </div>
            <div class="modal-footer">
                <form action="{{route('post_delete_article')}}" method="post">
                    <input name="article_id" value="{{$article->id}}" type="hidden">
                    <input type="hidden" value="{{Session::token()}}" name="_token">
                    <button class="btn btn-warning">Yes</button>
                    <button class="btn btn-default" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>