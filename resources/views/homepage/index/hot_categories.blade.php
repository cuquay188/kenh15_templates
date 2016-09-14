@foreach($hot_categories as $category)
    @if(count($category->category->articles))
        <div class="category shadow">
            <a href="{{route('homepage').'/category/'.$category->category->id}}"
               class="head">
                <div>
                    {{$category->category->name}}
                </div>
            </a>
            <div class="articles">
                @foreach(\App\Article::where('category_id',$category->category->id)->orderBy('id','desc')->take(2)->get() as $article)
                    <div class="article">
                        <div class="picture" style="background-image: url('{{$article->img_url}}')">
                            <div class="backdrop">
                                <a href="{{route('homepage').'/article/'.$article->url}}"><img
                                            src="{{$article->img_url}}"></a>
                            </div>
                        </div>
                        <div class="title">
                            <a href="{{route('homepage').'/article/'.$article->url}}">{{$article->title}}</a>
                        </div>
                    </div>
                @endforeach
                <div class="articles-list">
                    <div class="list">
                        <ul>
                            @foreach(\App\Article::where('category_id',$category->category->id)->orderBy('id','desc')->take(4)->skip(2)->get() as $article)
                                <li><a href="{{route('homepage').'/article/'.$article->url}}">{{$article->shorten_title(90)}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach