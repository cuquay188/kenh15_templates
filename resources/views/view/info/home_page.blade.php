@extends('view.layouts.master')
@section('title','ABC News')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/view/main.css')}}">
@endsection
@section('content')
    <div class="content-area">
        <div class="container">
            <!-- bài đọc nhiều nhất -->
            <aside class="sidebar-left col-lg-3">
                <div class="top-view">
                    <div class="head-top">
                        <a href="#">Top Read</a>
                    </div>
                    <div class="body-top">
                        <ul>
                            @foreach($articles as $article)
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
                        <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis arcu vel
                            ullamcorper maximus. Nulla facilisi.</a>
                    </div>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis arcu vel
                            ullamcorper
                            maximus. Nulla facilisi. Vestibulum est leo, pellentesque sit amet urna ac, auctor lacinia
                            nulla. Lorem ipsum dolor sit amet, consectetur consequat lorem tortor, eu imperdiet sapien
                            imperdiet quis. Praesent et pharetra metus, eu ornare velit. Sed finibus porttitor urna ac
                            tristique. Nam ex massa, commodo auctor nisl eget, dapibus dignissim sapien.Mauris tempor
                            convallis rhoncus. Nullam nec pharetra tellus. Nullam vel convallis ex. Phasellus id
                            facilisis
                            erat. Cras a lectus fringilla, ornare mauris ut, ultrices augue. Curabitur magna tortor,
                            vehicul...</p>
                    </div>
                </div>
                <div class="latest-artciles">
                    <div class="article">
                        <div class="picture">
                            <a href="#"><img
                                        src="http://adogbreeds.com/wp-content/uploads/2013/01/Alaskan-Malamute-Puppies.jpg"></a>
                        </div>
                        <div class="title">
                            <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis arcu
                                vel
                                ullamcorper maximus. Nulla facilisi.</a>
                        </div>
                    </div>
                    <div class="article">
                        <div class="picture">
                            <a href="#"><img
                                        src="http://dogplus.chodep.info/wp-content/uploads/2016/06/distinguish-alaska-dog-husky-dog-2.jpg"></a>
                        </div>
                        <div class="title">
                            <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                        </div>
                    </div>
                    <div class="article">
                        <div class="picture">
                            <a href="#"><img src="http://i.skyrock.net/2151/41382151/pics/1721199526_small.jpg"></a>
                        </div>
                        <div class="title">
                            <a href="#">Lorem ipsum dolor sit amet.</a>
                        </div>
                    </div>
                    <div class="article">
                        <div class="picture">
                            <a href="#"><img
                                        src="http://www.readingeagle.com/storyimage/RE/20150310/AP/303109583/EP/1/8/EP-303109583.jpg&q=80&MaxW=550&MaxH=400&RCRadius=5"></a>
                        </div>
                        <div class="title">
                            <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis arcu
                                vel
                                ullamcorper maximus. Nulla facilisi.</a>
                        </div>
                    </div>
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
                        <a href="#">Video is here</a>
                    </div>
                    <div class="title">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis arcu vel
                            ullamcorper maximus. Nulla facilisi.</a>
                    </div>
                </div>
                <div class="video-area">
                    <div class="video">
                        <a href="#">Video is here</a>
                    </div>
                    <div class="title">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis arcu vel
                            ullamcorper maximus. Nulla facilisi.</a>
                    </div>
                </div>
                <div class="video-area last">
                    <div class="video">
                        <a href="#">Video is here</a>
                    </div>
                    <div class="title">
                        <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis arcu vel
                            ullamcorper maximus. Nulla facilisi.</a>
                    </div>
                </div>
            </aside>
            <!-- end -->
        </div>
    </div>
    <div class="articles-by-category">
        <div class="category">
            <div class="head">
                <a href="#">Cat 1</a>
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
        <div class="category">
            <div class="head">
                <a href="#">Cat 2</a>
            </div>
            <div class="article">
                <div class="picture">
                    <a href="#"><img
                                src="http://dogplus.chodep.info/wp-content/uploads/2016/06/name-alaska-dog-alaskan-malamute-dog-2.jpg"></a>
                </div>
                <div class="title">
                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis arcu vel
                        ullamcorper maximus. Nulla facilisi.</a>
                </div>
            </div>
            <div class="article">
                <div class="picture">
                    <a href="#"><img
                                src="http://absfreepic.com/absolutely_free_photos/thumb_photos/beautiful-alaska-dog-3008x2000_50286.jpg"></a>
                </div>
                <div class="title">
                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis arcu vel
                        ullamcorper maximus. Nulla facilisi.</a>
                </div>
            </div>
            <div class="article">
                <div class="picture">
                    <a href="#"><img src="http://dallasseavey.com/uploads/willow-kennel-tours.jpg"></a>
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
    </div>
    <div class="goto-top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </div>
    <div class="goto-bottom">
        <span class="glyphicon glyphicon-chevron-down"></span>
    </div>
    <script>
        $('.goto-top').click(function () {
            $('body').animate({scrollTop: 0});
        });
        $('.goto-bottom').click(function () {
            $('body').animate({scrollTop: $(document).height() + $('body').height()});
        });
    </script>
@endsection
