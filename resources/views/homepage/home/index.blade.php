<link rel="stylesheet" href="{{asset('public/css/homepage/homepage.css')}}">
<div class="content-area main-body">
    <div class="container">
        <!-- bài đọc nhiều nhất -->
        <aside class="sidebar-left shadow col-lg-3">
            @include('homepage.home.top_articles')
        </aside>
        <!-- end -->

        <div class="main-content col-lg-9">
            <!-- các bài viết mới đăng -->
            <div class="new-articles shadow col-lg-8">
                @include('homepage.home.latest_articles')
            </div>
            <!-- end -->

            <!-- video -->
            <aside class="sidebar-right shadow col-lg-4">
                @include('homepage.home.top_videos')
            </aside>
            <!-- end -->

            <section ng-controller="categoriesController">
                <div class="articles-by-category col-lg-12" ng-controller="hotCategoriesController">
                    @include('homepage.home.hot_categories')
                </div>
            </section>
        </div>
    </div>
</div>