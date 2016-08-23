<footer>
    <div class="container">
        <div class="categories">
            <ul>
                @foreach(\App\Category::all() as $category)
                    <li><a href="{{route('homepage').'/category/'.$category->id}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</footer>