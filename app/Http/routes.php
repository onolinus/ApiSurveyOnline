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
    Route::group(['middleware' => ['\App\Http\Middleware\AdminPrivilegeMiddleware']], function () {
        Route::resource('user', 'UsersController', ['only' => [
            'store', 'destroy', 'update', 'show', 'index'
        ]]);

        Route::resource('registrasitoken', 'RegistrasiTokenController', ['only' => [
            'show', 'index'
        ]]);
    });

    # Correspondent
    Route::group(['middleware' => ['\App\Http\Middleware\CorrespondentPrivilegeMiddleware']], function () {
        Route::post('/correspondent/login', ['as' => 'correspondent-login', 'uses' => 'CorrespondentController@login']);
        Route::post('/correspondent/resetpassword', ['as' => 'correspondent-resetpassword', 'uses' => 'CorrespondentController@resetpassword']);
    });

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
        'store', 'update', 'show'
    ]]);
    Route::post('/auth/token/password', ['as' => 'auth.token.grantpassword', 'uses' => 'AuthController@grantpassword']);
});