<?php

Route::group([
    'middleware' => ['auth:api', 'admin'],
    'namespace' => 'Api',
], function () {
    Route::get('statistics', 'HomeController@statistics');

    Route::resource('user', 'UserController', ['except' => ['create', 'show']]);
    Route::post('/user/{id}/status', 'UserController@status');

    Route::resource('category', 'CategoryController', ['except' => ['create', 'show']]);
    Route::post('/category/{id}/status', 'CategoryController@status');

    Route::resource('discussion', 'DiscussionController', ['except' => ['create', 'show']]);
    Route::post('/discussion/{id}/status', 'DiscussionController@status');

    Route::resource('comment', 'CommentController', ['except' => ['create']]);

    Route::resource('tag', 'TagController', ['except' => ['create', 'show']]);
    Route::post('/tag/{id}/status', 'TagController@status');

    Route::resource('link', 'LinkController', ['except' => ['create', 'show']]);
    Route::post('/link/{id}/status', 'LinkController@status');

    Route::get('visitor', 'VisitorController@index');

    Route::get('upload', 'UploadController@index');
    Route::post('upload', 'UploadController@uploadForManager');
    Route::post('folder', 'UploadController@createFolder');
    Route::post('folder/delete', 'UploadController@deleteFolder');
    Route::post('file/delete', 'UploadController@deleteFile');

    Route::get('system', 'SystemController@getSystemInfo');
});

Route::group([
    'middleware' => ['auth:api'],
    'namespace' => 'Api',
], function () {
    // File Upload
    Route::post('file/upload', 'UploadController@fileUpload');
    
    // Edit Avatar
    Route::post('crop/avatar', 'UserController@cropAvatar');

    // Comment
    Route::get('commentable/{commentableId}/comment', 'CommentController@show');
    Route::post('comments', 'CommentController@store');
    Route::delete('comments/{id}', 'CommentController@destroy');
    Route::post('comments/vote/{type}', 'MeController@postVoteComment');
    Route::get('article/{id}/vote', 'ArticleController@showVote');
    Route::post('article/vote/{type}', 'MeController@postClapArticle');

    // Tag
    Route::get('tags', 'TagController@getList');

    // Category
    Route::get('/categories', 'CategoryController@getList');

    // Action for article
    Route::resource('article', 'ArticleController', ['names' => [
        'index' => 'api.article.index',
        'store' => 'api.article.store',
        'edit' => 'api.article.edit',
        'update' => 'api.article.update',
        'destroy' => 'api.article.destroy',
    ], 'except' => ['create', 'show']]);

    Route::post('article/draft', 'ArticleController@saveDraft');
    Route::patch('article/draft/{id}', 'ArticleController@updateDraft');
    Route::get('article/{userId}/drafts', 'ArticleController@getDraft');


});
