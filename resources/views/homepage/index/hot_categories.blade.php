@foreach($categories as $category)
    @if(count($category->articles))
        <div class="category">
            <div class="head">
                <a href="#">{{$category->name}}</a>
            </div>
            <div class="articles">
                @foreach(\App\Article::where('category_id',$category->id)->orderBy('id','desc')->take(2)->get() as $article)
                    <div class="article">
                        <div class="picture">
                            <a href="#"><img
                                        src="http://cdn2-www.dogtime.com/assets/uploads/2015/09/malamute-alaska-state-dog.jpg"></a>
                        </div>
                        <div class="title">
                            <a href="#">{{$article->title}}</a>
                        </div>
                    </div>
                @endforeach
                <div class="articles-list">
                    <div class="list">
                        <ul>
                            @foreach(\App\Article::where('category_id',$category->id)->orderBy('id','desc')->take(4)->skip(2)->get() as $article)
                                <li><a href="#">{{$article->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach