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
    'uses' => 'PageController@getArticle'
]);
Route::get('/article', [
    'uses' => 'PageController@getArticle',
    'as' => 'article'
]);
Route::get('/create/article', [
    'uses' => 'PageController@getCreateArticle',
    'as' => 'create_article'
]);
Route::post('/create/article', [
    'uses' => 'PageController@postCreateArticle',
    'as' => 'post_article'
]);
Route::post('/create/article1', [
    'uses' => 'PageController@postCreateArticle1',
    'as' => 'post_article_1'
]);
Route::post('/delete/article', [
    'uses' => 'PageController@postDeleteArticle',
    'as' => 'post_delete_article'
]);
Route::post('/edit/article', [
    'uses' => 'PageController@postUpdateArticle',
    'as' => 'post_update_article'
]);
Route::post('/articletag', [
    'uses' => 'PageController@postDeleteTagArticle',
    'as' => 'post_delete_tag_article'
]);

//Tag
Route::get('/tag', [
    'uses' => 'PageController@getTag',
    'as' => 'tag'
]);
Route::get('/create/tag', [
    'uses' => 'PageController@getCreateTag',
    'as' => 'create_tag'
]);
Route::post('/create/tag', [
    'uses' => 'PageController@postCreateTag',
    'as' => 'post_tag'
]);
Route::post('/edit/tag', [
    'uses' => 'PageController@postUpdateTag',
    'as' => 'post_update_tag'
]);
Route::post('/delete/tag', [
    'uses' => 'PageController@postDeleteTag',
    'as' => 'post_delete_tag'
]);

//Author
Route::get('/author', [
    'uses' => 'PageController@getAuthor',
    'as' => 'author'
]);
Route::get('/create/author', [
    'uses' => 'PageController@getCreateAuthor',
    'as' => 'create_author'
]);
Route::post('/create/author', [
    'uses' => 'PageController@postCreateAuthor',
    'as' => 'post_author'
]);
Route::post('/delete/author', [
    'uses' => 'PageController@postDeleteAuthor',
    'as' => 'post_delete_author'
]);
Route::post('/edit/author', [
    'uses' => 'PageController@postUpdateAuthor',
    'as' => 'post_update_author'
]);
Route::get('/create/authors', [
    'uses' => 'PageController@getCreateAuthors',
    'as' => 'create_authors'
]);

//Category
Route::get('/category', [
    'uses' => 'PageController@getCategory',
    'as' => 'category'
]);
Route::get('/create/category', [
    'uses' => 'PageController@getCreateCategory',
    'as' => 'create_category'
]);
Route::post('/create/category', [
    'uses' => 'PageController@postCreateCategory',
    'as' => 'post_category'
]);
Route::post('/delete/category', [
    'uses' => 'PageController@postDeleteCategory',
    'as' => 'post_delete_category'
]);
Route::post('/edit/category', [
    'uses' => 'PageController@postUpdateCategory',
    'as' => 'post_update_category'
]);
