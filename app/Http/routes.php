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
        Route::get('validator/survey', ['as' => 'validator.survey.index', 'uses' => 'Validator\SurveyController@index']);
    });
    Route::group(['prefix' => 'correspondent/{id}', 'middleware' => ['\App\Http\Middleware\ValidatorPrivilegeMiddleware']], function () {
        Route::get('survey/detail', ['as' => 'user.{id}.survey.show', 'uses' => 'Validator\SurveyController@show']);
    });

    # Survey Answers group : Admin & Validator
    Route::group(['prefix' => 'survey/{id}', 'middleware' => ['\App\Http\Middleware\AnswersPrivilegeMiddleware']], function () {
        Route::get('answers1', ['as' => 'survey.{id}.answers1.show', 'uses' => 'Survey\Answers1Controller@show']);
        Route::put('answers1/approve', ['as' => 'survey.{id}.answers1.approve', 'uses' => 'Survey\Answers1Controller@approve']);
        Route::put('answers1/reject', ['as' => 'survey.{id}.answers1.reject', 'uses' => 'Survey\Answers1Controller@reject']);

        Route::get('answers2', ['as' => 'survey.{id}.answers2.show', 'uses' => 'Survey\Answers2Controller@show']);
        Route::put('answers2/approve', ['as' => 'survey.{id}.answers2.approve', 'uses' => 'Survey\Answers2Controller@approve']);
        Route::put('answers2/reject', ['as' => 'survey.{id}.answers2.reject', 'uses' => 'Survey\Answers2Controller@reject']);

        Route::get('answers3', ['as' => 'survey.{id}.answers3.show', 'uses' => 'Survey\Answers3Controller@show']);
        Route::put('answers3/approve', ['as' => 'survey.{id}.answers3.approve', 'uses' => 'Survey\Answers3Controller@approve']);
        Route::put('answers3/reject', ['as' => 'survey.{id}.answers3.reject', 'uses' => 'Survey\Answers3Controller@reject']);

        Route::get('answers4', ['as' => 'survey.{id}.answers4.show', 'uses' => 'Survey\Answers4Controller@show']);
        Route::put('answers4/approve', ['as' => 'survey.{id}.answers4.approve', 'uses' => 'Survey\Answers4Controller@approve']);
        Route::put('answers4/reject', ['as' => 'survey.{id}.answers4.reject', 'uses' => 'Survey\Answers4Controller@reject']);

        Route::get('answers5', ['as' => 'survey.{id}.answers5.show', 'uses' => 'Survey\Answers5Controller@show']);
        Route::put('answers5/approve', ['as' => 'survey.{id}.answers5.approve', 'uses' => 'Survey\Answers5Controller@approve']);
        Route::put('answers5/reject', ['as' => 'survey.{id}.answers5.reject', 'uses' => 'Survey\Answers5Controller@reject']);

        Route::get('answers6', ['as' => 'survey.{id}.answers6.show', 'uses' => 'Survey\Answers6Controller@show']);
        Route::put('answers6/approve', ['as' => 'survey.{id}.answers6.approve', 'uses' => 'Survey\Answers6Controller@approve']);
        Route::put('answers6/reject', ['as' => 'survey.{id}.answers6.reject', 'uses' => 'Survey\Answers6Controller@reject']);

        Route::get('answers7', ['as' => 'survey.{id}.answers7.show', 'uses' => 'Survey\Answers7Controller@show']);
        Route::put('answers7/approve', ['as' => 'survey.{id}.answers7.approve', 'uses' => 'Survey\Answers7Controller@approve']);
        Route::put('answers7/reject', ['as' => 'survey.{id}.answers7.reject', 'uses' => 'Survey\Answers7Controller@reject']);

        Route::get('answers8', ['as' => 'survey.{id}.answers8.show', 'uses' => 'Survey\Answers8Controller@show']);
        Route::put('answers8/approve', ['as' => 'survey.{id}.answers8.approve', 'uses' => 'Survey\Answers8Controller@approve']);
        Route::put('answers8/reject', ['as' => 'survey.{id}.answers8.reject', 'uses' => 'Survey\Answers8Controller@reject']);

        Route::get('answers9a', ['as' => 'survey.{id}.answers9a.show', 'uses' => 'Survey\Answers9aController@show']);
        Route::put('answers9a/approve', ['as' => 'survey.{id}.answers9a.approve', 'uses' => 'Survey\Answers9aController@approve']);
        Route::put('answers9a/reject', ['as' => 'survey.{id}.answers9a.reject', 'uses' => 'Survey\Answers9aController@reject']);

        Route::get('answers9b', ['as' => 'survey.{id}.answers9b.show', 'uses' => 'Survey\Answers9bController@show']);
        Route::put('answers9b/approve', ['as' => 'survey.{id}.answers9b.approve', 'uses' => 'Survey\Answers9bController@approve']);
        Route::put('answers9b/reject', ['as' => 'survey.{id}.answers9b.reject', 'uses' => 'Survey\Answers9bController@reject']);

        Route::get('answers9c', ['as' => 'survey.{id}.answers9c.show', 'uses' => 'Survey\Answers9cController@show']);
        Route::put('answers9c/approve', ['as' => 'survey.{id}.answers9c.approve', 'uses' => 'Survey\Answers9cController@approve']);
        Route::put('answers9c/reject', ['as' => 'survey.{id}.answers9c.reject', 'uses' => 'Survey\Answers9cController@reject']);

        Route::get('answers10', ['as' => 'survey.{id}.answers10.show', 'uses' => 'Survey\Answers10Controller@show']);
        Route::put('answers10/approve', ['as' => 'survey.{id}.answers10.approve', 'uses' => 'Survey\Answers10Controller@approve']);
        Route::put('answers10/reject', ['as' => 'survey.{id}.answers10.reject', 'uses' => 'Survey\Answers10Controller@reject']);

        Route::get('answers11', ['as' => 'survey.{id}.answers11.show', 'uses' => 'Survey\Answers11Controller@show']);
        Route::put('answers11/approve', ['as' => 'survey.{id}.answers11.approve', 'uses' => 'Survey\Answers11Controller@approve']);
        Route::put('answers11/reject', ['as' => 'survey.{id}.answers11.reject', 'uses' => 'Survey\Answers11Controller@reject']);

        Route::get('answers12', ['as' => 'survey.{id}.answers12.show', 'uses' => 'Survey\Answers12Controller@show']);
        Route::put('answers12/approve', ['as' => 'survey.{id}.answers12.approve', 'uses' => 'Survey\Answers12Controller@approve']);
        Route::put('answers12/reject', ['as' => 'survey.{id}.answers12.reject', 'uses' => 'Survey\Answers12Controller@reject']);

        Route::get('answers13', ['as' => 'survey.{id}.answers13.show', 'uses' => 'Survey\Answers13Controller@show']);
        Route::put('answers13/approve', ['as' => 'survey.{id}.answers13.approve', 'uses' => 'Survey\Answers13Controller@approve']);
        Route::put('answers13/reject', ['as' => 'survey.{id}.answers13.reject', 'uses' => 'Survey\Answers13Controller@reject']);

        Route::get('answers14', ['as' => 'survey.{id}.answers14.show', 'uses' => 'Survey\Answers14Controller@show']);
        Route::put('answers14/approve', ['as' => 'survey.{id}.answers14.approve', 'uses' => 'Survey\Answers14Controller@approve']);
        Route::put('answers14/reject', ['as' => 'survey.{id}.answers14.reject', 'uses' => 'Survey\Answers14Controller@reject']);

        Route::get('answers15a', ['as' => 'survey.{id}.answers15a.show', 'uses' => 'Survey\Answers15aController@show']);
        Route::put('answers15a/approve', ['as' => 'survey.{id}.answers15a.approve', 'uses' => 'Survey\Answers15aController@approve']);
        Route::put('answers15a/reject', ['as' => 'survey.{id}.answers15a.reject', 'uses' => 'Survey\Answers15aController@reject']);

        Route::get('answers15b', ['as' => 'survey.{id}.answers15b.show', 'uses' => 'Survey\Answers15bController@show']);
        Route::put('answers15b/approve', ['as' => 'survey.{id}.answers15b.approve', 'uses' => 'Survey\Answers15bController@approve']);
        Route::put('answers15b/reject', ['as' => 'survey.{id}.answers15b.reject', 'uses' => 'Survey\Answers15bController@reject']);

        Route::get('answers16a', ['as' => 'survey.{id}.answers16a.show', 'uses' => 'Survey\Answers16aController@show']);
        Route::put('answers16a/approve', ['as' => 'survey.{id}.answers16a.approve', 'uses' => 'Survey\Answers16aController@approve']);
        Route::put('answers16a/reject', ['as' => 'survey.{id}.answers16a.reject', 'uses' => 'Survey\Answers16aController@reject']);

        Route::get('answers16b', ['as' => 'survey.{id}.answers16b.show', 'uses' => 'Survey\Answers16bController@show']);
        Route::put('answers16b/approve', ['as' => 'survey.{id}.answers16b.approve', 'uses' => 'Survey\Answers16bController@approve']);
        Route::put('answers16b/reject', ['as' => 'survey.{id}.answers16b.reject', 'uses' => 'Survey\Answers16bController@reject']);

        Route::get('answers17', ['as' => 'survey.{id}.answers17.show', 'uses' => 'Survey\Answers17Controller@show']);
        Route::put('answers17/approve', ['as' => 'survey.{id}.answers17.approve', 'uses' => 'Survey\Answers17Controller@approve']);
        Route::put('answers17/reject', ['as' => 'survey.{id}.answers17.reject', 'uses' => 'Survey\Answers17Controller@reject']);

        Route::get('answers18', ['as' => 'survey.{id}.answers18.show', 'uses' => 'Survey\Answers18Controller@show']);
        Route::put('answers18/approve', ['as' => 'survey.{id}.answers18.approve', 'uses' => 'Survey\Answers18Controller@approve']);
        Route::put('answers18/reject', ['as' => 'survey.{id}.answers18.reject', 'uses' => 'Survey\Answers18Controller@reject']);
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