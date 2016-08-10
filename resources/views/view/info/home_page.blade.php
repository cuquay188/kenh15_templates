@extends('view.layouts.master')
@section('title','ABC News')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/view/main.css')}}">
@endsection
@section('content')
    <div class="content-area container">
            <!-- bài đọc nhiều nhất -->
            <aside class="sidebar-left col-lg-3">
                <div class="top-view">
                    <div class="head-top">
                        <a href="#">Top Read</a>
                    </div>
                    <div class="body-top">
                        <ul>
                            @foreach($articles_top as $article)
                                <li><a href="#">{{$article->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="footer-top">
                        <a href="#">View all</a>
                    </div>
                </div>
            </aside>
            <!-- end -->

            <!-- các bài viết mới đăng -->
            <div class="new-articles col-lg-6">
                <div class="newest-article">
                    <div class="picture">
                        <a href="#"><img
                                    src="http://chopet.vn/wp-content/uploads/2015/10/become-a-certified-dog-trainer-in-alaska-2.jpg"></a>
                    </div>
                    <div class="title">
                        <a href="#">{{$article_first->title}}</a>
                    </div>
                    <div class="content">
                        <p>
                            <?php
                            echo $article_first->content
                            ?>
                        </p>
                    </div>
                </div>
                <div class="latest-artciles">
                    @foreach($articles_latest as $article)
                        <div class="article">
                            <div class="picture">
                                <a href="#"><img
                                            src="http://adogbreeds.com/wp-content/uploads/2013/01/Alaskan-Malamute-Puppies.jpg"></a>
                            </div>
                            <div class="title">
                                <a href="#">{{$article->title}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- end -->

            <!-- video -->
            <aside class="sidebar-right col-lg-3">
                <div class="head">
                    <a href="#">Top Video</a>
                </div>
                <div class="video-area">
                    <div class="video">

                    </div>
                    <div class="title">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis arcu vel
                            ullamcorper maximus. Nulla facilisi.</a>
                    </div>
                </div>
                <div class="video-area">
                    <div class="video">

                    </div>
                    <div class="title">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis arcu vel
                            ullamcorper maximus. Nulla facilisi.</a>
                    </div>
                </div>
                <div class="video-area">
                    <div class="video">

                    </div>
                    <div class="title">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis arcu vel
                            ullamcorper maximus. Nulla facilisi.</a>
                    </div>
                </div>
            </aside>
            <!-- end -->
    </div>
    <div class="articles-by-category container">
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
    </div>
    <div class="goto-top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </div>
    <script>
        $('.goto-top').click(function () {
            $('.body').animate({scrollTop: 0});
        });
    </script>
@endsection
