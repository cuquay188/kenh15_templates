@extends('homepage.layouts.master')
@section('title',$article->title)
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/homepage/article.css')}}">
@endsection
@section('content')
    <div class="content-area main-body">
        <div class="container">
            <aside class="sidebar-left shadow col-lg-3">
                @include('homepage.articles.related_articles')
            </aside>
            <div class="main-content col-lg-9">
                <div class="shadow col-lg-8">
                    <div class="category">
                        <a href="{{route('homepage')}}">Homepage</a>
                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                        <a href="#">{{$article->category->name}}</a>
                    </div>
                    <div class="title">
                        <h1>{{$article->title}}</h1>
                        <p class="time">
                            <label>{{$article->updated_at->format('d/m/Y')}}</label>
                            Last updated at: {{$article->updated_at->format('H:i')}}
                        </p>
                    </div>
                    <div class="article-content">
                        <?php
                        echo $article->content;
                        ?>
                    </div>
                    <div class="authors">
                        <label>By </label>
                        <?php
                        for ($i = 0; $i < count($article->authors); $i++) {
                            if ($i < count($article->authors) - 1) {
                                echo $article->authors[$i]->user->name . ', ';
                            } else {
                                echo $article->authors[$i]->user->name;
                            }
                        }
                        ?>
                    </div>
                    <div class="tags">
                        <label>Tag(s)</label>
                        @foreach($article->tags as $tag)
                            <a href="{{route('homepage').'/tag/'.$tag->url}}">
                                <i class="fa fa-tag" aria-hidden="true"></i> {{$tag->name}}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 advertisement">
                    <a href="#">
                        <img src="http://www.mixtgoods.com/images/logos/Static_160x578_MixtGoods_Ad.gif" alt="">
                    </a>
                </div>
                <div class="comments shadow col col-lg-8" style="padding: 0">
                    <div class="comment-quantity">
                        <span>5 bình luận</span>
                    </div>
                    <div class="body-comment">
                        <div class="comment-area row">
                            <div class="col-lg-12">
                                <div class="picture col col-lg-2">
                                    <img src="https://media.foody.vn/default/s30/user-default-male.png"
                                         alt="">
                                </div>
                                <div class="content col col-lg-8">
                                    <p class="name">User</p>
                                    <p class="comment">
                                        Ngưỡng mộ chị này quá. Tuy là rapper nhưng chị ấy vẫn giữ được vẻ mộc mạc không
                                        cầu kỳ, đã vậy còn vô cùng tự tin, tuy không rầm rộ nhưng thành tích đáng nể.
                                        Đây mới là hình mẫu con gái hiện đại nên học tập theo
                                    </p>
                                </div>
                                <div class="like col col-lg-2">
                                    <a class="text-style" href="#">Thích</a>
                                </div>
                            </div>
                            <div class="reply col-lg-12">
                                <div class="col col-lg-2"></div>
                                <div class="col col-lg-8"></div>
                                <div class="reply-button col col-lg-2">
                                    <span class="text-style">Trả lời</span>
                                </div>
                            </div>
                        </div>
                        <div class="comment-area row">
                            <div class="col-lg-12">
                                <div class="picture col col-lg-2">
                                    <img src="https://media.foody.vn/default/s30/user-default-male.png"
                                         alt="">
                                </div>
                                <div class="content col col-lg-8">
                                    <p class="name">User</p>
                                    <p class="comment">
                                        Ngưỡng mộ chị này quá
                                    </p>
                                </div>
                                <div class="like col col-lg-2">
                                    <a class="text-style" href="#">Thích</a>
                                </div>
                            </div>
                            <div class="reply col-lg-12">
                                <div class="col col-lg-2"></div>
                                <div class="col col-lg-8"></div>
                                <div class="reply-button col col-lg-2">
                                    <span class="text-style">Trả lời</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('body.scripts')
    <script src="{{asset('/js/homepage/sidebar-left.js')}}"></script>
@endsection