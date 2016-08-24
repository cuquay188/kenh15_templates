<header>
    <div class="container">
        <div class="title col-lg-2">
            <a href="{{route('homepage')}}">ABC News</a>
        </div>
        <div class="menu col-lg-7">
            <div class="menu-item {{Route::getCurrentRoute()->getName()=='homepage'?'active':''}}">
                <a href="{{route('homepage')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
            </div>
            @foreach(\App\CategoryAdvance::where('is_header','1')->take(5)->get() as $category)
                <div class="menu-item">
                    <a href="{{route('homepage').'/category/'.$category->category->id}}">{{$category->category->name}}</a>
                </div>
            @endforeach
            <div class="menu-item menu-dropdown">
                <div class="icon">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                    <div class="dropdown-content">
                        <ul>
                            @foreach(\App\CategoryAdvance::all() as $category)
                                <li>
                                    <a href="{{route('homepage').'/category/'.$category->category->id}}">{{$category->category->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
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
<script>

</script>
