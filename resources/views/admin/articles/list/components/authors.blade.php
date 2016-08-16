<?php
$authors = $article->authors;
$authors_filter = array();
if (!function_exists('search_author')) {
    function search_author($author_id, $authors)
    {
        foreach ($authors as $author) {
            if ($author->id == $author_id) return true;
        }
        return false;
    }
}
foreach ($authors as $author) {
    if (!search_author($author->id, $authors_filter))
        array_push($authors_filter, $author);
}
?>
@foreach($authors_filter as $author)
    <div class="tag-border">
        <a href="{{route('author').'/'.$author->id}}">{{$author->user->name}}</a><br>
        <button type="submit" class="close" data-toggle="modal"
                data-target="#delete{{$author->id}}{{$article->id}}">x
        </button>
        <div class="modal fade" role="dialog" id="delete{{$author->id}}{{$article->id}}"
             style="top: 150px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-weight: bold">Delete Article's author: "<span
                                    style="font-style: italic">{{$author->user->name}}</span>"</h5>
                    </div>
                    <div class="modal-body">
                        <p>Do you want to delete this author?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('post_delete_author_article')}}" method="POST">
                            <input type="hidden" value="{{Session::token()}}" name="_token">
                            <input type="hidden" value="{{$article->id}}" name="article_id">
                            <input type="hidden" value="{{$author->id}}" name="author_id">
                            <button class="btn btn-warning" type="submit">Yes</button>
                            <button class="btn btn-default" type="button" data-dismiss="modal">
                                No
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach