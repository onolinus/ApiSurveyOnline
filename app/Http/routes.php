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
            'store', 'destroy', 'update'
        ]]);

        Route::resource('registrasitoken', 'Admin\RegistrasiTokenController', ['only' => [
            'show', 'index'
        ]]);

        Route::resource('admin/survey', 'Admin\SurveyController', ['only' => [
            'show', 'index'
        ]]);

        Route::get('stats/lembaga/countuser', ['as' => 'lembaga.countuser', 'uses' => 'LembagaController@getUserCount']);
    });

    #Validator
    Route::group(['middleware' => ['\App\Http\Middleware\ValidatorPrivilegeMiddleware']], function () {
        Route::get('validator/survey/random', ['as' => 'validator.survey.random', 'uses' => 'Validator\SurveyController@random']);

        Route::resource('validator/survey', 'Validator\SurveyController', ['only' => [
            'show', 'index'
        ]]);
    });

    # Survey Answers group : Admin & Validator
    Route::group(['prefix' => 'survey/{id}', 'middleware' => ['\App\Http\Middleware\AnswersPrivilegeMiddleware']], function () {
        Route::get('answers1', ['as' => 'survey.{id}.answers1.show', 'uses' => 'Survey\Answers1Controller@show']);
        Route::put('answers1', ['as' => 'survey.{id}.answers1.update', 'uses' => 'Survey\Answers1Controller@update']);

        Route::get('answers2', ['as' => 'survey.{id}.answers2.show', 'uses' => 'Survey\Answers2Controller@show']);
        Route::put('answers2', ['as' => 'survey.{id}.answers2.update', 'uses' => 'Survey\Answers2Controller@update']);

        Route::get('answers3', ['as' => 'survey.{id}.answers3.show', 'uses' => 'Survey\Answers3Controller@show']);
        Route::put('answers3', ['as' => 'survey.{id}.answers3.update', 'uses' => 'Survey\Answers3Controller@update']);

        Route::get('answers4', ['as' => 'survey.{id}.answers4.show', 'uses' => 'Survey\Answers4Controller@show']);
        Route::put('answers4', ['as' => 'survey.{id}.answers4.update', 'uses' => 'Survey\Answers4Controller@update']);

        Route::get('answers5', ['as' => 'survey.{id}.answers5.show', 'uses' => 'Survey\Answers5Controller@show']);
        Route::put('answers5', ['as' => 'survey.{id}.answers5.update', 'uses' => 'Survey\Answers5Controller@update']);

        Route::get('answers6', ['as' => 'survey.{id}.answers6.show', 'uses' => 'Survey\Answers6Controller@show']);
        Route::put('answers6', ['as' => 'survey.{id}.answers6.update', 'uses' => 'Survey\Answers6Controller@update']);

        Route::get('answers7', ['as' => 'survey.{id}.answers7.show', 'uses' => 'Survey\Answers7Controller@show']);
        Route::put('answers7', ['as' => 'survey.{id}.answers7.update', 'uses' => 'Survey\Answers7Controller@update']);

        Route::get('answers8', ['as' => 'survey.{id}.answers8.show', 'uses' => 'Survey\Answers8Controller@show']);
        Route::put('answers8', ['as' => 'survey.{id}.answers8.update', 'uses' => 'Survey\Answers8Controller@update']);

        Route::get('answers9a', ['as' => 'survey.{id}.answers9a.show', 'uses' => 'Survey\Answers9aController@show']);
        Route::put('answers9a', ['as' => 'survey.{id}.answers9a.update', 'uses' => 'Survey\Answers9aController@update']);

        Route::get('answers9b', ['as' => 'survey.{id}.answers9b.show', 'uses' => 'Survey\Answers9bController@show']);
        Route::put('answers9b', ['as' => 'survey.{id}.answers9b.update', 'uses' => 'Survey\Answers9bController@update']);

        Route::get('answers9c', ['as' => 'survey.{id}.answers9c.show', 'uses' => 'Survey\Answers9cController@show']);
        Route::put('answers9c', ['as' => 'survey.{id}.answers9c.update', 'uses' => 'Survey\Answers9cController@update']);

        Route::get('answers10', ['as' => 'survey.{id}.answers10.show', 'uses' => 'Survey\Answers10Controller@show']);
        Route::put('answers10', ['as' => 'survey.{id}.answers10.update', 'uses' => 'Survey\Answers10Controller@update']);

        Route::get('answers11', ['as' => 'survey.{id}.answers11.show', 'uses' => 'Survey\Answers11Controller@show']);
        Route::put('answers11', ['as' => 'survey.{id}.answers11.update', 'uses' => 'Survey\Answers11Controller@update']);

        Route::get('answers12', ['as' => 'survey.{id}.answers12.show', 'uses' => 'Survey\Answers12Controller@show']);
        Route::put('answers12', ['as' => 'survey.{id}.answers12.update', 'uses' => 'Survey\Answers12Controller@update']);

        Route::get('answers13', ['as' => 'survey.{id}.answers13.show', 'uses' => 'Survey\Answers13Controller@show']);
        Route::put('answers13', ['as' => 'survey.{id}.answers13.update', 'uses' => 'Survey\Answers13Controller@update']);

        Route::get('answers14', ['as' => 'survey.{id}.answers14.show', 'uses' => 'Survey\Answers14Controller@show']);
        Route::put('answers14', ['as' => 'survey.{id}.answers14.update', 'uses' => 'Survey\Answers14Controller@update']);

        Route::get('answers15a', ['as' => 'survey.{id}.answers15a.show', 'uses' => 'Survey\Answers15aController@show']);
        Route::put('answers15a', ['as' => 'survey.{id}.answers15a.update', 'uses' => 'Survey\Answers15aController@update']);

        Route::get('answers15b', ['as' => 'survey.{id}.answers15b.show', 'uses' => 'Survey\Answers15bController@show']);
        Route::put('answers15b', ['as' => 'survey.{id}.answers15b.update', 'uses' => 'Survey\Answers15bController@update']);

        Route::get('answers16a', ['as' => 'survey.{id}.answers16a.show', 'uses' => 'Survey\Answers16aController@show']);
        Route::put('answers16a', ['as' => 'survey.{id}.answers16a.update', 'uses' => 'Survey\Answers16aController@update']);

        Route::get('answers16b', ['as' => 'survey.{id}.answers16b.show', 'uses' => 'Survey\Answers16bController@show']);
        Route::put('answers16b', ['as' => 'survey.{id}.answers16b.update', 'uses' => 'Survey\Answers16bController@update']);

        Route::get('answers17', ['as' => 'survey.{id}.answers17.show', 'uses' => 'Survey\Answers17Controller@show']);
        Route::put('answers17', ['as' => 'survey.{id}.answers17.update', 'uses' => 'Survey\Answers17Controller@update']);

        Route::get('answers18', ['as' => 'survey.{id}.answers18.show', 'uses' => 'Survey\Answers18Controller@show']);
        Route::put('answers18', ['as' => 'survey.{id}.answers18.update', 'uses' => 'Survey\Answers18Controller@update']);
    });

    #Admin & Validator & Guest
    Route::group(['middleware' => ['\App\Http\Middleware\DashboardUserGroupPrivilegeMiddleware']], function () {
        Route::resource('user', 'Admin\UsersController', ['only' => [
            'show', 'index'
        ]]);

        Route::resource('admin/correspondent', 'Admin\CorrespondentController', ['only' => [
            'show', 'index'
        ]]);

        Route::resource('admin/approvedby', 'Admin\ApprovedByController', ['only' => [
            'show', 'index'
        ]]);
    });


    # Correspondent Frontend
    Route::group(['middleware' => ['\App\Http\Middleware\CorrespondentPrivilegeMiddleware']], function () {
        Route::resource('correspondent/profile', 'Correspondent\ProfileController', ['only' => [
            'store', 'index'
        ]]);

        // Draft
        Route::resource('correspondent/draft', 'Correspondent\SurveyDraftController', ['only' => [
            'store', 'index'
        ]]);
        Route::get('correspondent/draft/data', ['as' => 'respondent.draft.data', 'uses' => 'Correspondent\SurveyDraftController@draftdata']);
        Route::get('correspondent/draft/status', ['as' => 'respondent.draft.status', 'uses' => 'Correspondent\SurveyDraftController@draftstatus']);

        // Survey
        Route::resource('correspondent/survey', 'Correspondent\SurveyController', ['only' => [
            'store', 'index'
        ]]);
        Route::get('correspondent/survey/data', ['as' => 'respondent.survey.data', 'uses' => 'Correspondent\SurveyController@surveydata']);
        Route::get('correspondent/survey/status', ['as' => 'respondent.survey.status', 'uses' => 'Correspondent\SurveyController@surveystatus']);
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

    Route::resource('lembaga', 'LembagaController', ['only' => [
        'show', 'index'
    ]]);

    Route::resource('bidangilmu', 'KlasifikasiBidangIlmuController', ['only' => [
        'show', 'index'
    ]]);

    Route::resource('/auth/token', 'AuthController', ['only' => [
        'store', 'show'
    ]]);
    Route::post('/auth/token/password', ['as' => 'auth.token.grantpassword', 'uses' => 'AuthController@grantpassword']);
    Route::post('/auth/token/passwordhashed', ['as' => 'auth.token.grantpasswordhashed', 'uses' => 'AuthController@grantpasswordhashed']);
    Route::put('/auth/token/refresh', ['as' => 'auth.token.refresh', 'uses' => 'AuthController@refresh']);


    Route::get('/', function(){
        return [
            'error' => [
                "code" => "GEN-NOT-FOUND",
                "http_code" => 404,
                "message" => [
                    trans('page not found')
                ]
            ]
        ];
    });

});