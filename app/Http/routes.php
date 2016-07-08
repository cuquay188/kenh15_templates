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


//User
Route::get('/', [
    'uses' => 'UserController@getLogin',
    'as' => 'login'
]);
Route::get('/login', [
    'uses' => 'UserController@getLogin',
    'as' => 'login'
]);
Route::post('/login', [
    'uses' => 'UserController@postLogin',
    'as' => 'post_login'
]);
Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'logout'
]);
Route::get('/signup', [
    'uses' => 'UserController@getSignUp',
    'as' => 'signup'
]);
Route::post('/signup/user', [
    'uses' => 'UserController@postSignUp',
    'as' => 'post_sign_up'
]);
Route::get('/user', [
    'uses' => 'UserController@getUserManagement',
    'as' => 'user_management'
]);
Route::post('/edit/user', [
    'uses' => 'UserController@postUpdateUser',
    'as' => 'post_update_user'
]);
Route::post('/change/password/user', [
    'uses' => 'UserController@postChangePasswordUser',
    'as' => 'post_change_password_user'
]);

//Article
Route::get('/article', [
    'uses' => 'ArticleController@getArticle',
    'as' => 'article'
]);
Route::get('/create/article', [
    'uses' => 'ArticleController@getCreateArticle',
    'as' => 'create_article'
]);
Route::post('/create/article1', [
    'uses' => 'ArticleController@postCreateArticle',
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
Route::post('/articleauthor', [
    'uses' => 'ArticleController@postDeleteAuthorArticle',
    'as' => 'post_delete_author_article'
]);
Route::get('/article/{id}', [
    'uses' => 'ArticleController@getViewArticle'
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
Route::get('/tag/{id}', [
    'uses' => 'TagController@getViewTag'
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
Route::get('/author/{id}', [
    'uses' => 'AuthorController@getViewAuthor'
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
Route::get('/category/{id}', [
    'uses' => 'CategoryController@getViewCategory'
]);
 
