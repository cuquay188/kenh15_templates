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

Route::group(['prefix' => 'admin'], function () {
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
    Route::get('/users', [
        'uses' => 'UserController@getUsers',
        'as' => 'users'
    ]);

    //Article
    Route::get('/article', [
        'uses' => 'ArticleController@getArticleList',
        'as' => 'article'
    ]);
    Route::get('/article/{url}', [
        'uses' => 'ArticleController@getSingleArticle'
    ]);
    Route::post('/create/article', [
        'uses' => 'ArticleController@postCreateArticle',
        'as' => 'post_create_article'
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

    //Tag
    Route::get('/tag', [
        'uses' => 'TagController@getTag',
        'as' => 'admin.tag'
    ]);
    Route::get('/create/tag', [
        'uses' => 'TagController@getCreateTag',
        'as' => 'create_tag'
    ]);
    Route::post('/create/tag', [
        'uses' => 'TagController@postCreateTag',
        'as' => 'post_tag'
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
        'as' => 'admin.update.category.name'
    ]);
    Route::get('/category/{id}', [
        'uses' => 'CategoryController@getViewCategory'
    ]);
    Route::get('/refresh-database', [
        'uses' => 'ArticleController@refreshDatabase',
        'as' => 'admin.fix.database',
    ]);

});
Route::group(['prefix' => 'api'], function () {
    Route::get('/article',[
       'as' => 'admin.api.article'
    ]);
    Route::get('/article/{id}', [
        'uses' => 'ArticleController@getArticleJSON'
    ]);
    Route::post('create/article/validate', [
        'uses' => 'ArticleController@postValidateArticle',
        'as' => 'admin.validate.article'
    ]);


    Route::post('/category/hot', [
        'uses' => 'CategoryController@postHotCategory',
        'as' => 'admin.update.category.hot'
    ]);
    Route::post('/category/header', [
        'uses' => 'CategoryController@postHeaderCategory',
        'as' => 'admin.update.category.header'
    ]);

    Route::group(['prefix' => 'tag'], function () {

        Route::get('/length',[
            'uses' => 'TagController@getTagLength',
            'as' => 'admin.api.tag.get.length'
        ]);
        Route::get('/get/{id?}',[
            'uses' => 'TagController@getTagJSON',
            'as' => 'admin.api.tag.get'
        ]);

        Route::post('/update', [
            'uses' => 'TagController@postUpdateTag',
            'as' => 'admin.api.tag.update'
        ]);
        Route::post('/delete',[
            'uses'=>'TagController@postRemoveTag',
            'as' => 'admin.api.tag.remove'
        ]);

    });
});
// Home page
Route::get('/', [
    'uses' => 'HomePageController@getHomePage',
    'as' => 'homepage'
]);
Route::get('/article/{id}', [
    'uses' => 'HomepageController@getArticle'
]);
Route::get('/category/{id}', [
    'uses' => 'HomepageController@getSingleCategory'
]);
