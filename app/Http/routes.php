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

Route::group(['middleware' => ['apisurveylitbang']], function () {
    # Admin
    Route::group(['middleware' => ['\App\Http\Middleware\AdminPrivilegeMiddleware']], function () {
        Route::resource('user', 'Admin\UsersController', ['only' => [
            'store', 'destroy', 'update', 'show', 'index'
        ]]);

        Route::resource('registrasitoken', 'Admin\RegistrasiTokenController', ['only' => [
            'show', 'index'
        ]]);
    });

    # Correspondent
    Route::group(['middleware' => ['\App\Http\Middleware\CorrespondentPrivilegeMiddleware']], function () {
        Route::resource('correspondent/profile', 'Correspondent\ProfileController', ['only' => [
            'store', 'index'
        ]]);
    });

    # Public
    Route::post('/user/register', ['as' => 'register', 'uses' => 'UserController@store']);
    Route::post('/user/resetpassword', ['as' => 'resetpassword', 'uses' => 'UserController@update']);

    Route::resource('researchfields', 'ResearchFieldsController', ['only' => [
        'show', 'index'
    ]]);

    Route::resource('socioeconomics', 'SocioEconomicsController', ['only' => [
        'show', 'index'
    ]]);

    Route::resource('questions', 'QuestionsController', ['only' => [
        'show', 'index'
    ]]);

    Route::resource('/auth/token', 'AuthController', ['only' => [
        'store', 'show'
    ]]);
    Route::post('/auth/token/password', ['as' => 'auth.token.grantpassword', 'uses' => 'AuthController@grantpassword']);
    Route::put('/auth/token/refresh', ['as' => 'auth.token.refresh', 'uses' => 'AuthController@refresh']);
});