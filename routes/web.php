<?php
//Route test variables
Route::get('/testt', 'Api\HomeController@statistics');

//Route Social Login
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

// User Auth
Auth::routes();
Route::post('password/change', 'UserController@changePassword')->middleware('auth');

// Github Auth Route
// Route::group(['prefix' => 'auth/github'], function () {
//     Route::get('/', 'Auth\AuthController@redirectToProvider');
//     Route::get('callback', 'Auth\AuthController@handleProviderCallback');
//     Route::get('register', 'Auth\AuthController@create');
//     Route::post('register', 'Auth\AuthController@store');
// });

// Search
Route::get('search', 'HomeController@search');

// Discussion
Route::resource('discussion', 'DiscussionController', ['except' => 'destroy']);

// Team
Route::resource('team', 'TeamController', ['except' => 'destroy']);

// User
Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'UserController@index');
    Route::get('/all-auther', 'UserController@allAuther');
    Route::get('/all-auther/search', 'UserController@searchAuthor');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('profile', 'UserController@edit');
        Route::put('profile/{id}', 'UserController@update');
        Route::post('follow/{id}', 'UserController@doFollow');
        Route::get('notification', 'UserController@notifications');
        Route::post('notification', 'UserController@markAsRead');
    });

    Route::group(['prefix' => '{username}'], function () {
        Route::get('/', 'UserController@show');
        Route::get('comments', 'UserController@comments');
        Route::get('following', 'UserController@following');
        Route::get('discussions', 'UserController@discussions');
    });
});

// User Setting
Route::group(['middleware' => 'auth', 'prefix' => 'setting'], function () {
    Route::get('/', 'SettingController@index')->name('setting.index');
    Route::get('binding', 'SettingController@binding')->name('setting.binding');

    Route::get('notification', 'SettingController@notification')->name('setting.notification');
    Route::post('notification', 'SettingController@setNotification');
});

// Link
Route::get('link', 'LinkController@index');

// Category
Route::group(['prefix' => 'category'], function () {
    Route::post('create', 'CategoryController@store');
    Route::get('{category}', 'CategoryController@show');
    Route::get('/', 'CategoryController@index');
});

// Tag
Route::group(['prefix' => 'tag'], function () {
    Route::get('/', 'TagController@index');
    Route::get('{tag}', 'TagController@show');
});

/* Dashboard Index */
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'admin']], function () {

    Route::get('{path?}', 'HomeController@dashboard')->where('path', '[\/\w\.-]*');

});

// Article
Route::get('/', 'ArticleController@index')->name('home');
Route::get('{slug}', 'ArticleController@show');
Route::get('article/new', 'ArticleController@create');
Route::post('article/new', 'ArticleController@store');
Route::get('article/{id}/edit', 'ArticleController@edit');
Route::put('article/{id}/edit', 'ArticleController@update');

//User Join Team
Route::post('user/join-team/{slug}', 'TeamController@userJoinTeam')->name('join.team');
