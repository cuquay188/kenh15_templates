<div class="newest-article">
    <div class="picture">
        <a href="{{route('homepage').'/article/'.$article_first->id}}"><img
                    src="http://chopet.vn/wp-content/uploads/2015/10/become-a-certified-dog-trainer-in-alaska-2.jpg"></a>
    </div>
    <div class="title">
        <a href="{{route('homepage').'/article/'.$article_first->id}}">{{$article_first->title}}</a>
    </div>
    <div class="content">
        <p>
            <?php
            echo $article_first->content
            ?>
        </p>
    </div>
</div>
<div class="latest-artciles">
    @foreach($articles_latest as $article)
        <div class="article">
            <div class="picture">
                <a href="{{route('homepage').'/article/'.$article->id}}"><img
                            src="http://adogbreeds.com/wp-content/uploads/2013/01/Alaskan-Malamute-Puppies.jpg"></a>
            </div>
            <div class="title">
                <a href="{{route('homepage').'/article/'.$article->id}}">{{$article->title}}</a>
            </div>
        </div>
    @endforeach
</div>