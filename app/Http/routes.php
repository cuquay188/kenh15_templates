<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/create', function () {
//    return view('create');
//})->name("create");
//Route::get('/index',function(){
//    return view('index');
//})->name("index");
//Route::get('/about',function(){
//    return view('about');
//})->name('about');

Route::get('/cards', function () {
    return view('card');
});
Route::get('/demo', function () {
    return view('demo');
});

//Article
Route::get('/', [
    'uses' => 'ArticleController@getArticle'
]);
Route::get('/article', [
    'uses' => 'ArticleController@getArticle',
    'as' => 'article'
]);
Route::get('/create/article', [
    'uses' => 'ArticleController@getCreateArticle',
    'as' => 'create_article'
]);
Route::post('/create/article', [
    'uses' => 'ArticleController@postCreateArticle',
    'as' => 'post_article'
]);
Route::post('/create/article1', [
    'uses' => 'ArticleController@postCreateArticle1',
    'as' => 'post_article_1'
]);
Route::post('/delete/article', [
    'uses' => 'ArticleController@postDeleteArticle',
    'as' => 'post_delete_article'
]);
Route::post('/edit/article', [
    'uses' => 'ArticleController@postUpdateArticle',
    'as' => 'post_update_article'
]);
Route::post('/articletag', [
    'uses' => 'ArticleController@postDeleteTagArticle',
    'as' => 'post_delete_tag_article'
]);

//Tag
Route::get('/tag', [
    'uses' => 'TagController@getTag',
    'as' => 'tag'
]);
Route::get('/create/tag', [
    'uses' => 'TagController@getCreateTag',
    'as' => 'create_tag'
]);
Route::post('/create/tag', [
    'uses' => 'TagController@postCreateTag',
    'as' => 'post_tag'
]);
Route::post('/edit/tag', [
    'uses' => 'TagController@postUpdateTag',
    'as' => 'post_update_tag'
]);
Route::post('/delete/tag', [
    'uses' => 'TagController@postDeleteTag',
    'as' => 'post_delete_tag'
]);

//Author
Route::get('/author', [
    'uses' => 'AuthorController@getAuthor',
    'as' => 'author'
]);
Route::get('/create/author', [
    'uses' => 'AuthorController@getCreateAuthor',
    'as' => 'create_author'
]);
Route::post('/create/author', [
    'uses' => 'AuthorController@postCreateAuthor',
    'as' => 'post_author'
]);
Route::post('/delete/author', [
    'uses' => 'AuthorController@postDeleteAuthor',
    'as' => 'post_delete_author'
]);
Route::post('/edit/author', [
    'uses' => 'AuthorController@postUpdateAuthor',
    'as' => 'post_update_author'
]);

//Category
Route::get('/category', [
    'uses' => 'CategoryController@getCategory',
    'as' => 'category'
]);
Route::get('/create/category', [
    'uses' => 'CategoryController@getCreateCategory',
    'as' => 'create_category'
]);
Route::post('/create/category', [
    'uses' => 'CategoryController@postCreateCategory',
    'as' => 'post_category'
]);
Route::post('/delete/category', [
    'uses' => 'CategoryController@postDeleteCategory',
    'as' => 'post_delete_category'
]);
Route::post('/edit/category', [
    'uses' => 'CategoryController@postUpdateCategory',
    'as' => 'post_update_category'
]);
