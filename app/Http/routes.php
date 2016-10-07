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

//Admin Router
Route::group(['prefix' => 'admin'], function () {
    //User
    Route::group(['prefix' => 'auth'], function () {
        Route::get('/login', [
            'uses' => 'UserController@getLogin',
            'as'   => 'admin.auth.login',
        ]);
        Route::post('/login', [
            'uses' => 'UserController@postLogin',
            'as'   => 'admin.auth.login.post',
        ]);
        Route::get('/logout', [
            'uses' => 'UserController@getLogout',
            'as'   => 'admin.auth.logout',
        ]);
        Route::get('/profile', [
            'uses' => 'UserController@getUserProfile',
            'as'   => 'admin.user.profile',
        ]);
        Route::get('/users', [
            'uses' => 'UserController@getUsers',
            'as'   => 'users',
        ]);
        //Redirect to Socialite auth
        Route::get('/redirect={social}', [
            'uses' => 'SocialAuthController@redirect',
            'as'   => 'admin.user.login.redirectTo',
        ]);
        //Hook Auth callback
        Route::get('/callback={social}', 'SocialAuthController@callback');
    });

    Route::get('/', [
        'uses' => 'DashboardController@getIndex',
        'as'   => 'admin.index',
    ]);
    /*Dashboard*/
    Route::get('/dashboard', [
        'uses' => 'DashboardController@getDashboard',
        'as'   => 'admin.dashboard',
    ]);
    /*End Dashboard*/

    /*Article*/
    Route::get('/article', [
        'uses' => 'ArticleController@getArticleList',
        'as'   => 'admin.article',
    ]);
    Route::get('/article/{url}', [
        'uses' => 'ArticleController@getSingleArticle',
    ]);
    /*End Article*/

    /*Tag*/
    Route::get('/tag', [
        'uses' => 'TagController@getTagManagement',
        'as'   => 'admin.tag',
    ]);
    Route::get('/tag/{id}', [
        'uses' => 'TagController@getViewTag',
    ]);
    /*End Tag*/

    /*Author*/
    Route::get('/author', [
        'uses' => 'AuthorController@getAuthor',
        'as'   => 'admin.author',
    ]);
    Route::get('/author/{id}', [
        'uses' => 'AuthorController@getViewAuthor',
    ]);
    /*End Author*/

    /*Category*/
    Route::get('/category', [
        'uses' => 'CategoryController@getCategory',
        'as'   => 'admin.category',
    ]);
    Route::get('/category/{id}', [
        'uses' => 'CategoryController@getViewCategory',
    ]);
    /*End Category*/

    Route::get('/refresh-database', [
        'uses' => 'ArticleController@refreshDatabase',
        'as'   => 'admin.fix.database',
    ]);

});
Route::group(['prefix' => 'api'], function () {

    Route::group(['prefix' => 'article'], function () {
        Route::get('/select/{id?}', [
            'uses' => 'ArticleController@getArticleJSON',
            'as'   => 'admin.api.article.select',
        ]);

        Route::get('/get/article_url={url?}',[
            'uses' => 'ArticleController@getSingleArticleJSON',
            'as'   => 'admin.api.article.get'
        ]);

        Route::get('selectContent/{id?}', [
            'uses' => 'ArticleController@getContentJSON',
            'as'   => 'admin.api.article.select.content',
        ]);

        Route::post('/validate', [
            'uses' => 'ArticleController@postValidateArticle',
            'as'   => 'admin.api.article.validate',
        ]);
        Route::post('/update', [
            'uses' => 'ArticleController@postUpdateArticle',
            'as'   => 'admin.api.article.update',
        ]);
        Route::group(['prefix' => 'delete'], function () {

            Route::post('/article', [
                'uses' => 'ArticleController@postRemoveArticle',
                'as'   => 'admin.api.article.remove.article',
            ]);
            Route::post('/tag', [
                'uses' => 'ArticleController@postRemoveTag',
                'as'   => 'admin.api.article.remove.tag',
            ]);
            Route::post('/author', [
                'uses' => 'ArticleController@postRemoveAuthor',
                'as'   => 'admin.api.article.remove.author',
            ]);
        });
        Route::post('/create', [
            'uses' => 'ArticleController@postCreateArticle',
            'as'   => 'admin.api.article.create',
        ]);
    });

    Route::group(['prefix' => 'author'], function () {

        Route::get('/select/{id?}', [
            'uses' => 'AuthorController@getAuthorJSON',
            'as'   => 'admin.api.author.select',
        ]);
        Route::get('get/users', [
            'uses' => 'AuthorController@getNormalUser',
            'as'   => 'admin.api.author.select.normal_user',
        ]);

        Route::post('/update', [
            'uses' => 'AuthorController@postUpdateAuthor',
            'as'   => 'admin.api.author.update',
        ]);
        Route::post('/delete', [
            'uses' => 'AuthorController@postRemoveAuthor',
            'as'   => 'admin.api.author.remove',
        ]);
        Route::post('/create', [
            'uses' => 'AuthorController@postCreateAuthor',
            'as'   => 'admin.api.author.create',
        ]);
    });

    Route::group(['prefix' => 'category'], function () {

        Route::get('/select/{id?}', [
            'uses' => 'CategoryController@getCategoryJSON',
            'as'   => 'admin.api.category.select',
        ]);

        Route::get('/get/url={url?}',[
            'uses' => 'CategoryController@getCategoryByUrlJSON',
            'as'   => 'admin.api.category.select.byUrl'
        ]);

        Route::get('/get/hotCategories',[
            'uses' => 'CategoryController@getHotCategoriesJSON',
            'as'   => 'admin.api.category.select.hot'
        ]);

        Route::get('/get/articles/category_url={url?}',[
            'uses' => 'ArticleController@getArticlesByCategoryJSON',
            'as'   => 'admin.api.category.select.articles'
        ]);

        Route::post('/update/name', [
            'uses' => 'CategoryController@postUpdateCategory',
            'as'   => 'admin.api.category.update.name',
        ]);

        Route::post('/update/hot', [
            'uses' => 'CategoryController@postHotCategory',
            'as'   => 'admin.api.category.update.hot',
        ]);

        Route::post('/update/header', [
            'uses' => 'CategoryController@postHeaderCategory',
            'as'   => 'admin.api.category.update.header',
        ]);

        Route::post('/delete', [
            'uses' => 'CategoryController@postRemoveCategory',
            'as'   => 'admin.api.category.remove',
        ]);

        Route::post('/create', [
            'uses' => 'CategoryController@postCreateCategory',
            'as'   => 'admin.api.category.create',
        ]);
    });

    Route::group(['prefix' => 'tag'], function () {

        Route::get('/select/{id?}', [
            'uses' => 'TagController@getTagJSON',
            'as'   => 'admin.api.tag.select',
        ]);

        Route::get('/get/url={url?}',[
            'uses' => 'TagController@getTagByUrlJSON',
            'as'   => 'admin.api.tag.select.byUrl'
        ]);

        Route::get('/get/articles/tag_url={url?}',[
            'uses' => 'ArticleController@getArticlesByTagJSON',
            'as'   => 'admin.api.tag.select.articles'
        ]);

        Route::post('/update', [
            'uses' => 'TagController@postUpdateTag',
            'as'   => 'admin.api.tag.update',
        ]);
        Route::post('/delete', [
            'uses' => 'TagController@postRemoveTag',
            'as'   => 'admin.api.tag.remove',
        ]);
        Route::post('/create', [
            'uses' => 'TagController@postCreateTag',
            'as'   => 'admin.api.tag.create',
        ]);
    });

    Route::group(['prefix' => 'user'], function () {

        Route::get('/select/{id?}', [
            'uses' => 'UserController@getUserJSON',
            'as'   => 'admin.api.user.select',
        ]);
        Route::post('/update', [
            'uses' => 'UserController@postUpdateAuthor',
            'as'   => 'admin.api.user.update',
        ]);
    });

    Route::group(['prefix' => 'auth'], function () {
        Route::get('/', [
            'uses' => 'UserController@getAuthUser',
            'as'   => 'admin.api.auth.user',
        ]);

        Route::post('/update/info', [
            'uses' => 'UserController@postUpdateUser',
            'as'   => 'admin.api.auth.update.info',
        ]);
        Route::post('/update/password', [
            'uses' => 'UserController@postChangeUserPassword',
            'as'   => 'admin.api.auth.update.password',
        ]);
        Route::post('/update/username', [
            'uses' => 'UserController@postChangeUsername',
            'as'   => 'admin.api.auth.update.username',
        ]);
    });

});
// Home page
Route::get('/', [
    'uses' => 'HomePageController@getHomePage',
    'as'   => 'homepage',
]);
Route::get('/article/{url?}', [
    'uses' => 'HomepageController@getArticle',
]);
Route::get('/tag/{url?}', [
    'uses' => 'HomepageController@getTag',
]);
Route::get('/category/{url?}', [
    'uses' => 'HomepageController@getSingleCategory',
]);