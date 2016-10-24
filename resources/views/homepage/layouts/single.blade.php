@yield('single.styles')
<div class="main-body container">
    <div class="col-lg-8 ">
        <div class="articles">
            @yield('single.top')
            @yield('single.related_articles')
        </div>
    </div>
    @include('homepage.layouts.advertisement.single_page')
</div>
@yield('single.body.scripts')