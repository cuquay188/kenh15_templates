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

Route::get('/', [
    'uses' => 'PageController@getIndex'
]);
Route::get('/index', [
    'uses' => 'PageController@getIndex',
    'as' => 'index'
]);
Route::get('/about', [
    'uses' => 'PageController@getAbout',
    'as' => 'about'
]);
Route::get('/category', [
    'uses' => 'PageController@getCategory',
    'as' => 'category'
]);
Route::get('/create/article', [
    'uses' => 'PageController@getCreateArticle',
    'as' => 'create_article'
]);
Route::get('/create/category', [
    'uses' => 'PageController@getCreateCategory',
    'as' => 'create_category'
]);
Route::get('/create/author', [
    'uses' => 'PageController@getCreateAuthor',
    'as' => 'create_author'
]);
Route::post('/create/article', [
    'uses' => 'PageController@postCreateArticle',
    'as' => 'post_article'
]);
Route::post('/create/category', [
    'uses' => 'PageController@postCreateCategory',
    'as' => 'post_category'
]);
Route::post('/create/author', [
    'uses' => 'PageController@postCreateAuthor',
    'as' => 'post_author'
]);
Route::get('/cards', function () {
    return view('card');
});
Route::get('/demo', function () {
    return view('demo');
});
