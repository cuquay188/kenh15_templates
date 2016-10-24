<footer>
    <div class="container">
        <div class="categories col-lg-8">
            <ul class="row">
                @foreach(\App\Category::all() as $category)
                    <li class="col-sm-4 col-lg-2"><a
                                href="#home">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="info col-lg-4">
            <p>Copyright <i class="fa fa-copyright" aria-hidden="true"></i> by Phạm Văn Trí, Lê Thị Thùy Dung</p>
        </div>
    </div>
</footer>