<header>
    <div class="container">
        <div class="title col-lg-2">
            <h2>ABC News</h2>
        </div>
        <div class="menu col-lg-7">
            <div class="menu-item">
                <a href="{{route('categories')}}">Menu</a>
            </div>
            <div class="menu-item">
                <a href="{{route('homepage')}}">Home</a>
            </div>
            @foreach(\App\Category::take(5)->get() as $category)
                <div class="menu-item">
                    <a href="#">{{$category->name}}</a>
                </div>
            @endforeach
        </div>
        <div class="search-area col-lg-3">
            <div class="search-form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search...">
                    <a href="#">
                        <span class="glyphicon glyphicon-search"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
