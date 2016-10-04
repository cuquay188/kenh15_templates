@extends('homepage.layouts.master')
@section('title','Article')
@section('styles')
    <link rel="stylesheet" href="{{asset('/css/homepage/article.css')}}">
@endsection
@section('content')
    <div class="content-area main-body" ng-controller="articleController">
        <div class="container">
            <aside class="sidebar-left shadow col-lg-3">
                @include('homepage.articles.related_articles')
            </aside>
            <div class="main-content col-lg-9">
                <div class="shadow col-lg-8">
                    <div class="category">
                        <a href="{{route('homepage')}}">Homepage</a>
                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                        <a href="{{route('homepage')}}/category/[[article.category.url]]">[[article.category.name]]</a>
                    </div>
                    <div class="title">
                        <h1>[[article.title]]</h1>
                        <p class="time">
                            <label>[[article.updated_at.date | date:'dd/MM/yyyy']]</label>
                            Last updated at: [[article.updated_at.date | date:'HH:mm']]
                        </p>
                    </div>
                    <div class="article-content" ng-bind-html="article.content"></div>
                    <div class="authors">
                        <label>By</label>
                        <span ng-repeat="author in article.authors track by $index">
                            <span ng-if="$index < article.authors.length - 1">[[author.name]], </span>
                            <span ng-if="$index == article.authors.length - 1">[[author.name]]</span>
                        </span>
                    </div>
                    <div class="tags">
                        <label>Tag(s)</label>
                        <a href="{{route('homepage')}}/tag/[[tag.url]]" ng-repeat="tag in article.tags track by $index">
                            <i class="fa fa-tag" aria-hidden="true"></i> [[tag.name]]
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 advertisement">
                    <a href="#">
                        <img src="http://www.mixtgoods.com/images/logos/Static_160x578_MixtGoods_Ad.gif" alt="">
                    </a>
                </div>
                <div class="comments shadow col col-lg-8" style="padding: 0">
                    <div class="new-comment">
                        <div class="new-comment-form row">
                            <div class="picture col col-lg-2">
                                <img src="https://media.foody.vn/default/s30/user-default-male.png"
                                     alt="">
                            </div>
                            <div class="new-comment-content col col-lg-10">
                                <textarea name="new-comment-content" id="new-comment-content" cols="64" rows="4"
                                          placeholder="Your comment..."></textarea>
                            </div>
                            <div class="new-comment-send col-lg-12">
                                <div class="col col-lg-2"></div>
                                <div class="col col-lg-7"></div>
                                <div class="send-button col col-lg-3">
                                    <button class="btn btn-primary">
                                        <span>Gửi bình luận</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-quantity">
                        <span>52 bình luận</span>
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
                            <div class="reply-form col col-lg-12">
                                <div class="reply-form-top row">
                                    <div class="title col col-lg-11">Trả lời</div>
                                    <div class="cancel col col-lg-1">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="reply-form-body row">
                                    <div class="picture col col-lg-2">
                                        <img src="https://media.foody.vn/default/s30/user-default-male.png"
                                             alt="">
                                    </div>
                                    <div class="reply-content col col-lg-10">
                                        <textarea name="reply-content" id="reply-content" cols="57" rows="5"></textarea>
                                    </div>
                                    <div class="reply-send col-lg-12">
                                        <div class="col col-lg-2"></div>
                                        <div class="col col-lg-7"></div>
                                        <div class="send-button col col-lg-3">
                                            <button class="btn btn-primary">
                                                <span>Gửi bình luận</span>
                                            </button>
                                        </div>
                                    </div>
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
    <script>
        $('.reply-button').click(function () {
            $('.reply-form').slideDown(400);
        });
        $('.cancel').click(function () {
            $('.reply-form').slideUp(400);
        });
    </script>
    <script>
        var url = {
            article: {
                info: function (article_id) {
                    return '{{route('admin.api.article.get')}}' + article_id
                }
            }
        }
    </script>
@endsection