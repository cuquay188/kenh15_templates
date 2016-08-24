<footer>
    <div class="container">
        <div class="categories col-lg-8">
            <ul class="row">
                @foreach(\App\Category::all() as $category)
                    <li class="col-sm-4 col-lg-2"><a
                                href="{{route('homepage').'/category/'.$category->id}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="info col-lg-4">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem culpa laboriosam molestias natus.
                Accusamus,
                aliquid atque dolor dolore esse fuga, odio quae quas quis, soluta suscipit ut vel velit? Beatae.</p>
        </div>
    </div>
</footer>