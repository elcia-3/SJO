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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/send/{addr}', 'mailController@send');

Route::group(['prefix' => 'user'], function () {

    Route::get('/signin', [
        'uses' => 'UserController@getSignin',
        'as' => 'user.signin'
    ]);

    Route::post('/signin', [
        'uses' => 'UserController@postSignin',
        'as' => 'user.signin'
    ]);

    Route::get('/Auth/{encryptedEmail}', [
        'uses' => 'UserController@getAuth',
        'as' => 'user.Auth'
    ]);

    Route::post('/signup', [
        'uses' => 'UserController@postSignup',
        'as' => 'user.signup'
    ]);

    Route::get('/signup', [
        'uses' => 'UserController@getSignup',
        'as' => 'user.signup'
    ]);

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/signout', [
            'uses' => 'UserController@getSignout',
            'as' => 'user.signout'
        ]);
        
        Route::get('/mainRegistration', [
            'uses' => 'UserController@getMainRegistration',
            'as' => 'user.mainRegistration'
        ]);
    });
});

Route::group(['prefix' => 'course'], function () {
    Route::group(['middleware' => 'auth'], function () {

        Route::get('/allCourses', [
            'uses' => 'CourseController@getAllCourses',
            'as' => 'course.allCourses'
        ]);

        Route::post('/searchCourses', [
            'uses' => 'CourseController@postSearchCourses',
            'as' => 'course.searchCourses'
        ]);

        Route::get('/makeCourse', [
            'uses' => 'CourseController@getMakeCourse',
            'as' => 'course.makeCourse'
        ]);

        Route::post('/makeCourse', [
            'uses' => 'CourseController@postMakeCourse',
            'as' => 'course.makeCourse'
        ]);

        Route::get('/allFavorites', [
            'uses' => 'CourseController@getAllFavorites',
            'as' => 'course.allFavorites'
        ]);

        Route::get('/favorite/{courseID}', [
            'uses' => 'CourseController@getClickFavorite',
            'as' => 'course.favorite'
        ]);

        Route::get('/unfavorite/{courseID}', [
            'uses' => 'CourseController@getClickUnFavorite',
            'as' => 'course.unfavorite'
        ]);

    });
});

Route::group(['prefix' => 'bbs'], function () {
    Route::group(['middleware' => 'auth'], function () {

        Route::get('{courseID}/allThreads', [
            'uses' => 'ThreadsController@getAllThreads',
            'as' => 'bbs.allThreads'
        ]);

        Route::get('{courseID}/createThread', [
            'uses' => 'ThreadsController@getCreateThread',
            'as' => 'bbs.createThread'
        ]);

        Route::post('{courseID}/createThread', [
            'uses' => 'ThreadsController@postCreateThread',
            'as' => 'bbs.createThread'
        ]);

        Route::get('thread/{threadID}', [
            'uses' => 'ThreadsController@getThread',
            'as' => 'bbs.thread'
        ]);
        
        Route::post('thread/{threadID}', [
            'uses' => 'ThreadsController@postThread',
            'as' => 'bbs.thread'
        ]);
    });
});