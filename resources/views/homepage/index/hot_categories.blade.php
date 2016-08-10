@foreach($categories as $category)
    <div class="category">
        <div class="head">
            <a href="#">{{$category->name}}</a>
        </div>
        <div class="article">
            <div class="picture">
                <a href="#"><img
                            src="http://cdn2-www.dogtime.com/assets/uploads/2015/09/malamute-alaska-state-dog.jpg"></a>
            </div>
            <div class="title">
                <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis arcu vel
                    ullamcorper maximus. Nulla facilisi.</a>
            </div>
        </div>
        <div class="article">
            <div class="picture">
                <a href="#"><img src="http://chopet.vn/wp-content/uploads/2015/10/IMG_6355_zpsrujz3m9h.jpg"></a>
            </div>
            <div class="title">
                <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis arcu vel
                    ullamcorper maximus. Nulla facilisi.</a>
            </div>
        </div>
        <div class="article">
            <div class="picture">
                <a href="#"><img
                            src="http://i1321.photobucket.com/albums/u550/dog_shop/IMG_6030_zps0d21d276.jpg"></a>
            </div>
            <div class="title">
                <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis arcu vel
                    ullamcorper maximus. Nulla facilisi.</a>
            </div>
        </div>
        <div class="articles-list">
            <div class="list">
                <ul>
                    <li><a href="#">News 1</a></li>
                    <li><a href="#">News 2</a></li>
                    <li><a href="#">News 3</a></li>
                    <li><a href="#">News 4</a></li>
                    <li><a href="#">News 5</a></li>
                </ul>
            </div>
        </div>
    </div>
@endforeach