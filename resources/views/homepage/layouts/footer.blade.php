<footer>
    <div class="container">
        <div class="categories">
            <ul>
                @foreach(\App\Category::all() as $category)
                    <li class="col-xs-2"><a href="#">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="info">
            <div class="col-xs-2">
                <a href="#">About Us</a>
            </div>
            <div class="col-xs-2">
                <a href="#">Terms Use</a>
            </div>
        </div>
    </div>
</footer>