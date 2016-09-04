<?php
$tags = $article->tags;
$result = array();
if (!function_exists('search')) {
    function search($tag_id, $tags)
    {
        foreach ($tags as $tag) {
            if ($tag->id == $tag_id) return true;
        }
        return false;
    }
}
for ($i = 0; $i < count($tags); $i++) {
    if (!search($tags[$i]->id, $result)) {
        array_push($result, $tags[$i]);
    }
}
?>

@foreach($result as $tag)
    <div class="tag-border">
        <a href="{{route('admin.tag').'/'.$tag->id}}">{{$tag->name}}</a>
        <button type="submit" class="close" data-toggle="modal"
                data-target="#delete{{$tag->id}}{{$article->id}}">x
        </button>
        <div class="modal fade" role="dialog" id="delete{{$tag->id}}{{$article->id}}"
             style="top: 150px">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-weight: bold">Delete Article's tag: "<span
                                    style="font-style: italic">{{$tag->name}}</span>"</h5>
                    </div>
                    <div class="modal-body">
                        <p>Do you want to delete this tag?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('post_delete_tag_article')}}" method="POST">
                            <input type="hidden" value="{{Session::token()}}" name="_token">
                            <input type="hidden" value="{{$article->id}}" name="article_id">
                            <input type="hidden" value="{{$tag->id}}" name="tag_id">
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