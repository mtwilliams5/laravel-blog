<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [
    'uses' => 'PostController@getIndex',
    'as' => 'blog.index'
]);

Route::get('post/{id}', [
    'uses' => 'PostController@getPost',
    'as' => 'blog.post'
]);

Route::get('post/{id}/like', [
    'uses' => 'PostController@getLikePost',
    'as' => 'blog.post.like'
]);

Route::get('profile/{id}', [
    'uses' => 'UserController@getUserProfile',
    'as' => 'user.profile'
]);

/*
|--------------------------------------------------------------------------
| Admin Routes (Posts)
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('', [
        'uses' => 'PostController@getAdminIndex',
        'as' => 'admin.index'
    ]);

    Route::get('create', [
        'uses' => 'PostController@getAdminCreate',
        'as' => 'admin.create'
    ]);

    Route::post('create', [
        'uses' => 'PostController@postAdminCreate',
        'as' => 'admin.create'
    ]);

    Route::get('edit/{id}', [
        'uses' => 'PostController@getAdminEdit',
        'as' => 'admin.edit'
    ]);
    
    Route::get('delete/{id}', [
        'uses' => 'PostController@getAdminDelete',
        'as' => 'admin.delete'
    ]);
    
    Route::get('publish/{id}', [
        'uses' => 'PostController@postAdminPublish',
        'as' => 'admin.publish'
    ]);
    
    Route::get('unpublish/{id}', [
        'uses' => 'PostController@postAdminUnpublish',
        'as' => 'admin.unpublish'
    ]);

    Route::post('edit', [
        'uses' => 'PostController@postAdminUpdate',
        'as' => 'admin.update'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Admin Routes (Tags)
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'tags'], function () {
        Route::get('', [
            'uses' => 'TagController@getAdminIndex',
            'as' => 'admin.tags.index'
        ]);
        
        Route::get('create', [
            'uses' => 'TagController@getAdminCreate',
            'as' => 'admin.tags.create'
        ]);

        Route::post('create', [
            'uses' => 'TagController@postAdminCreate',
            'as' => 'admin.tags.create'
        ]);
        
        Route::get('edit/{id}', [
            'uses' => 'TagController@getAdminEdit',
            'as' => 'admin.tags.edit'
        ]);

        Route::post('edit', [
            'uses' => 'TagController@postAdminUpdate',
            'as' => 'admin.tags.update'
        ]);

        Route::get('delete/{id}', [
            'uses' => 'TagController@getAdminDelete',
            'as' => 'admin.tags.delete'
        ]);
    });

    /*
    |--------------------------------------------------------------------------
    | Admin Routes (Users)
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'users'], function () {
        Route::get('', [
            'uses' => 'UserController@getUsersAdmin',
            'as' => 'admin.users.index'
        ]);

        Route::get('create', [
            'uses' => 'UserController@getUserCreate',
            'as' => 'admin.user.create'
        ]);

        Route::post('create', [
            'uses' => 'UserController@postUserCreate',
            'as' => 'admin.user.create'
        ]);
        
        Route::get('edit/{id}', [
            'uses' => 'TagController@getUserEdit',
            'as' => 'admin.user.edit'
        ]);

        Route::post('edit', [
            'uses' => 'TagController@postUserUpdate',
            'as' => 'admin.user.update'
        ]);

        Route::get('delete/{id}', [
            'uses' => 'TagController@getUserDelete',
            'as' => 'admin.user.delete'
        ]);
    });

});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Auth::routes();
