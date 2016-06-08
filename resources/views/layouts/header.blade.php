<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('article')}}" style="font-weight: bold;color: white">Kenh 15 Admin</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{route('article')}}">Article</a></li>
            <li><a href="{{route('author')}}">Author</a></li>
            <li><a href="{{route('category')}}">Category</a></li>
            <li><a href="{{route('tag')}}">Tag</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Create
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('create_article')}}">Create Article</a></li>
                    <li><a href="{{route('create_category')}}">Create Category</a></li>
                    <li><a href="{{route('create_author')}}">Create Author</a></li>
                    <li><a href="{{route('create_tag')}}">Create Tag</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>