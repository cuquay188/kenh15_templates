<header>
    <div class="container">
        <div class="title col-lg-2">
            <a href="#/">Kênh 15</a>
        </div>
        <div class="menu col-lg-7">
            <a href="#/">
                <div class="menu-item {{Route::getCurrentRoute()->getName()=='homepage'?'active':''}}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
            </a>
            @foreach(\App\CategoryAdvance::where('is_header','1')->take(5)->get() as $category)
                <a href="#category/{{$category->category->url}}">
                    <div class="menu-item">
                        {{$category->category->name}}
                    </div>
                </a>
            @endforeach
            <div class="menu-item menu-dropdown">
                <div class="icon">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                    <div class="dropdown-content">
                        @foreach(\App\CategoryAdvance::all() as $category)
                            <a href="#home">{{$category->category->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="search-area col-lg-3">
            <div class="search-form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm...">
                    <a href="#">
                        <span class="glyphicon glyphicon-search"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>