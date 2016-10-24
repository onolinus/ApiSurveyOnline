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
    });

    #Validator
    Route::group(['middleware' => ['\App\Http\Middleware\ValidatorPrivilegeMiddleware']], function () {
        Route::get('validator/survey/random', ['as' => 'validator.survey.random', 'uses' => 'Validator\SurveyController@random']);
        Route::get('validator/survey', ['as' => 'validator.survey.index', 'uses' => 'Validator\SurveyController@index']);
    });
    Route::group(['prefix' => 'correspondent/{user_id}', 'middleware' => ['\App\Http\Middleware\ValidatorPrivilegeMiddleware']], function () {
        Route::get('survey/detail', ['as' => 'user.{user_id}.survey.show', 'uses' => 'Validator\SurveyController@show']);
    });
    Route::group(['prefix' => 'survey/{id_answer}', 'middleware' => ['\App\Http\Middleware\ValidatorPrivilegeMiddleware']], function () {
        Route::get('answers1', ['as' => 'survey.{id_answer}.answers1.show', 'uses' => 'Survey\Answers1Controller@show']);
        Route::put('answers1/approve', ['as' => 'survey.{id_answer}.answers1.approve', 'uses' => 'Survey\Answers1Controller@approve']);
        Route::put('answers1/reject', ['as' => 'survey.{id_answer}.answers1.reject', 'uses' => 'Survey\Answers1Controller@reject']);
        Route::put('answers1/comment', ['as' => 'survey.{id_answer}.answers1.comment', 'uses' => 'Survey\Answers1Controller@comment']);

        Route::get('answers2', ['as' => 'survey.{id_answer}.answers2.show', 'uses' => 'Survey\Answers2Controller@show']);
        Route::put('answers2/approve', ['as' => 'survey.{id_answer}.answers2.approve', 'uses' => 'Survey\Answers2Controller@approve']);
        Route::put('answers2/reject', ['as' => 'survey.{id_answer}.answers2.reject', 'uses' => 'Survey\Answers2Controller@reject']);
        Route::put('answers2/comment', ['as' => 'survey.{id_answer}.answers2.comment', 'uses' => 'Survey\Answers2Controller@comment']);

        Route::get('answers3', ['as' => 'survey.{id_answer}.answers3.show', 'uses' => 'Survey\Answers3Controller@show']);
        Route::put('answers3/approve', ['as' => 'survey.{id_answer}.answers3.approve', 'uses' => 'Survey\Answers3Controller@approve']);
        Route::put('answers3/reject', ['as' => 'survey.{id_answer}.answers3.reject', 'uses' => 'Survey\Answers3Controller@reject']);
        Route::put('answers3/comment', ['as' => 'survey.{id_answer}.answers3.comment', 'uses' => 'Survey\Answers3Controller@comment']);

        Route::get('answers4', ['as' => 'survey.{id_answer}.answers4.show', 'uses' => 'Survey\Answers4Controller@show']);
        Route::put('answers4/approve', ['as' => 'survey.{id_answer}.answers4.approve', 'uses' => 'Survey\Answers4Controller@approve']);
        Route::put('answers4/reject', ['as' => 'survey.{id_answer}.answers4.reject', 'uses' => 'Survey\Answers4Controller@reject']);
        Route::put('answers4/comment', ['as' => 'survey.{id_answer}.answers4.comment', 'uses' => 'Survey\Answers4Controller@comment']);

        Route::get('answers5', ['as' => 'survey.{id_answer}.answers5.show', 'uses' => 'Survey\Answers5Controller@show']);
        Route::put('answers5/approve', ['as' => 'survey.{id_answer}.answers5.approve', 'uses' => 'Survey\Answers5Controller@approve']);
        Route::put('answers5/reject', ['as' => 'survey.{id_answer}.answers5.reject', 'uses' => 'Survey\Answers5Controller@reject']);
        Route::put('answers5/comment', ['as' => 'survey.{id_answer}.answers5.comment', 'uses' => 'Survey\Answers5Controller@comment']);

        Route::get('answers6', ['as' => 'survey.{id_answer}.answers6.show', 'uses' => 'Survey\Answers6Controller@show']);
        Route::put('answers6/approve', ['as' => 'survey.{id_answer}.answers6.approve', 'uses' => 'Survey\Answers6Controller@approve']);
        Route::put('answers6/reject', ['as' => 'survey.{id_answer}.answers6.reject', 'uses' => 'Survey\Answers6Controller@reject']);
        Route::put('answers6/comment', ['as' => 'survey.{id_answer}.answers6.comment', 'uses' => 'Survey\Answers6Controller@comment']);

        Route::get('answers7', ['as' => 'survey.{id_answer}.answers7.show', 'uses' => 'Survey\Answers7Controller@show']);
        Route::put('answers7/approve', ['as' => 'survey.{id_answer}.answers7.approve', 'uses' => 'Survey\Answers7Controller@approve']);
        Route::put('answers7/reject', ['as' => 'survey.{id_answer}.answers7.reject', 'uses' => 'Survey\Answers7Controller@reject']);
        Route::put('answers7/comment', ['as' => 'survey.{id_answer}.answers7.comment', 'uses' => 'Survey\Answers7Controller@comment']);

        Route::get('answers8', ['as' => 'survey.{id_answer}.answers8.show', 'uses' => 'Survey\Answers8Controller@show']);
        Route::put('answers8/approve', ['as' => 'survey.{id_answer}.answers8.approve', 'uses' => 'Survey\Answers8Controller@approve']);
        Route::put('answers8/reject', ['as' => 'survey.{id_answer}.answers8.reject', 'uses' => 'Survey\Answers8Controller@reject']);
        Route::put('answers8/comment', ['as' => 'survey.{id_answer}.answers8.comment', 'uses' => 'Survey\Answers8Controller@comment']);

        Route::get('answers9a', ['as' => 'survey.{id_answer}.answers9a.show', 'uses' => 'Survey\Answers9aController@show']);
        Route::put('answers9a/approve', ['as' => 'survey.{id_answer}.answers9a.approve', 'uses' => 'Survey\Answers9aController@approve']);
        Route::put('answers9a/reject', ['as' => 'survey.{id_answer}.answers9a.reject', 'uses' => 'Survey\Answers9aController@reject']);
        Route::put('answers9a/comment', ['as' => 'survey.{id_answer}.answers9a.comment', 'uses' => 'Survey\Answers9aController@comment']);

        Route::get('answers9b', ['as' => 'survey.{id_answer}.answers9b.show', 'uses' => 'Survey\Answers9bController@show']);
        Route::put('answers9b/approve', ['as' => 'survey.{id_answer}.answers9b.approve', 'uses' => 'Survey\Answers9bController@approve']);
        Route::put('answers9b/reject', ['as' => 'survey.{id_answer}.answers9b.reject', 'uses' => 'Survey\Answers9bController@reject']);
        Route::put('answers9b/comment', ['as' => 'survey.{id_answer}.answers9b.comment', 'uses' => 'Survey\Answers9bController@comment']);

        Route::get('answers9c', ['as' => 'survey.{id_answer}.answers9c.show', 'uses' => 'Survey\Answers9cController@show']);
        Route::put('answers9c/approve', ['as' => 'survey.{id_answer}.answers9c.approve', 'uses' => 'Survey\Answers9cController@approve']);
        Route::put('answers9c/reject', ['as' => 'survey.{id_answer}.answers9c.reject', 'uses' => 'Survey\Answers9cController@reject']);
        Route::put('answers9c/comment', ['as' => 'survey.{id_answer}.answers9c.comment', 'uses' => 'Survey\Answers9cController@comment']);

        Route::get('answers10', ['as' => 'survey.{id_answer}.answers10.show', 'uses' => 'Survey\Answers10Controller@show']);
        Route::put('answers10/approve', ['as' => 'survey.{id_answer}.answers10.approve', 'uses' => 'Survey\Answers10Controller@approve']);
        Route::put('answers10/reject', ['as' => 'survey.{id_answer}.answers10.reject', 'uses' => 'Survey\Answers10Controller@reject']);
        Route::put('answers10/comment', ['as' => 'survey.{id_answer}.answers10.comment', 'uses' => 'Survey\Answers10Controller@comment']);

        Route::get('answers11', ['as' => 'survey.{id_answer}.answers11.show', 'uses' => 'Survey\Answers11Controller@show']);
        Route::put('answers11/approve', ['as' => 'survey.{id_answer}.answers11.approve', 'uses' => 'Survey\Answers11Controller@approve']);
        Route::put('answers11/reject', ['as' => 'survey.{id_answer}.answers11.reject', 'uses' => 'Survey\Answers11Controller@reject']);
        Route::put('answers11/comment', ['as' => 'survey.{id_answer}.answers11.comment', 'uses' => 'Survey\Answers11Controller@comment']);

        Route::get('answers12', ['as' => 'survey.{id_answer}.answers12.show', 'uses' => 'Survey\Answers12Controller@show']);
        Route::put('answers12/approve', ['as' => 'survey.{id_answer}.answers12.approve', 'uses' => 'Survey\Answers12Controller@approve']);
        Route::put('answers12/reject', ['as' => 'survey.{id_answer}.answers12.reject', 'uses' => 'Survey\Answers12Controller@reject']);
        Route::put('answers12/comment', ['as' => 'survey.{id_answer}.answers12.comment', 'uses' => 'Survey\Answers12Controller@comment']);

        Route::get('answers13', ['as' => 'survey.{id_answer}.answers13.show', 'uses' => 'Survey\Answers13Controller@show']);
        Route::put('answers13/approve', ['as' => 'survey.{id_answer}.answers13.approve', 'uses' => 'Survey\Answers13Controller@approve']);
        Route::put('answers13/reject', ['as' => 'survey.{id_answer}.answers13.reject', 'uses' => 'Survey\Answers13Controller@reject']);
        Route::put('answers13/comment', ['as' => 'survey.{id_answer}.answers13.comment', 'uses' => 'Survey\Answers13Controller@comment']);

        Route::get('answers14', ['as' => 'survey.{id_answer}.answers14.show', 'uses' => 'Survey\Answers14Controller@show']);
        Route::put('answers14/approve', ['as' => 'survey.{id_answer}.answers14.approve', 'uses' => 'Survey\Answers14Controller@approve']);
        Route::put('answers14/reject', ['as' => 'survey.{id_answer}.answers14.reject', 'uses' => 'Survey\Answers14Controller@reject']);
        Route::put('answers14/comment', ['as' => 'survey.{id_answer}.answers14.comment', 'uses' => 'Survey\Answers14Controller@comment']);

        Route::get('answers15a', ['as' => 'survey.{id_answer}.answers15a.show', 'uses' => 'Survey\Answers15aController@show']);
        Route::put('answers15a/approve', ['as' => 'survey.{id_answer}.answers15a.approve', 'uses' => 'Survey\Answers15aController@approve']);
        Route::put('answers15a/reject', ['as' => 'survey.{id_answer}.answers15a.reject', 'uses' => 'Survey\Answers15aController@reject']);
        Route::put('answers15a/comment', ['as' => 'survey.{id_answer}.answers15a.comment', 'uses' => 'Survey\Answers15aController@comment']);

        Route::get('answers15b', ['as' => 'survey.{id_answer}.answers15b.show', 'uses' => 'Survey\Answers15bController@show']);
        Route::put('answers15b/approve', ['as' => 'survey.{id_answer}.answers15b.approve', 'uses' => 'Survey\Answers15bController@approve']);
        Route::put('answers15b/reject', ['as' => 'survey.{id_answer}.answers15b.reject', 'uses' => 'Survey\Answers15bController@reject']);
        Route::put('answers15b/comment', ['as' => 'survey.{id_answer}.answers15b.comment', 'uses' => 'Survey\Answers15bController@comment']);

        Route::get('answers16a', ['as' => 'survey.{id_answer}.answers16a.show', 'uses' => 'Survey\Answers16aController@show']);
        Route::put('answers16a/approve', ['as' => 'survey.{id_answer}.answers16a.approve', 'uses' => 'Survey\Answers16aController@approve']);
        Route::put('answers16a/reject', ['as' => 'survey.{id_answer}.answers16a.reject', 'uses' => 'Survey\Answers16aController@reject']);
        Route::put('answers16a/comment', ['as' => 'survey.{id_answer}.answers16a.comment', 'uses' => 'Survey\Answers16aController@comment']);

        Route::get('answers16b', ['as' => 'survey.{id_answer}.answers16b.show', 'uses' => 'Survey\Answers16bController@show']);
        Route::put('answers16b/approve', ['as' => 'survey.{id_answer}.answers16b.approve', 'uses' => 'Survey\Answers16bController@approve']);
        Route::put('answers16b/reject', ['as' => 'survey.{id_answer}.answers16b.reject', 'uses' => 'Survey\Answers16bController@reject']);
        Route::put('answers16b/comment', ['as' => 'survey.{id_answer}.answers16b.comment', 'uses' => 'Survey\Answers16bController@comment']);

        Route::get('answers17', ['as' => 'survey.{id_answer}.answers17.show', 'uses' => 'Survey\Answers17Controller@show']);
        Route::put('answers17/approve', ['as' => 'survey.{id_answer}.answers17.approve', 'uses' => 'Survey\Answers17Controller@approve']);
        Route::put('answers17/reject', ['as' => 'survey.{id_answer}.answers17.reject', 'uses' => 'Survey\Answers17Controller@reject']);
        Route::put('answers17/comment', ['as' => 'survey.{id_answer}.answers17.comment', 'uses' => 'Survey\Answers17Controller@comment']);

        Route::get('answers18', ['as' => 'survey.{id_answer}.answers18.show', 'uses' => 'Survey\Answers18Controller@show']);
        Route::put('answers18/approve', ['as' => 'survey.{id_answer}.answers18.approve', 'uses' => 'Survey\Answers18Controller@approve']);
        Route::put('answers18/reject', ['as' => 'survey.{id_answer}.answers18.reject', 'uses' => 'Survey\Answers18Controller@reject']);
        Route::put('answers18/comment', ['as' => 'survey.{id_answer}.answers18.comment', 'uses' => 'Survey\Answers18Controller@comment']);
    });


    # Survey Answers group : Admin & Validator
    Route::group(['prefix' => 'survey/{id_answer}', 'middleware' => ['\App\Http\Middleware\AnswersPrivilegeMiddleware']], function () {
        Route::put('approve', ['as' => 'survey.{id_answer}.approve', 'uses' => 'Survey\AnswersController@approve']);
        Route::put('reject', ['as' => 'survey.{id_answer}.reject', 'uses' => 'Survey\AnswersController@reject']);
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



        Route::resource('stats/total/summary', 'Guest\Report\TotalSummaryController', ['only' => [
            'index'
        ]]);
        Route::resource('stats/answers/sent', 'Guest\Report\SentAnswersController', ['only' => [
            'index'
        ]]);
        Route::get('stats/lembaga/countuser', ['as' => 'stats.lembaga.countuser', 'uses' => 'Guest\Report\CountUserLembagaController@index']);
        Route::get('stats/lembaga/totalbelanja', ['as' => 'stats.lembaga.totalbelanja', 'uses' => 'Guest\Report\TotalBelanjaLembagaController@index']);
        Route::get('stats/totalbelanja/bidang-penelitian', ['as' => 'stats.belanja.bidangpenelitian', 'uses' => 'Guest\Report\TotalBelanjaBidangPenelitianController@index']);
        Route::get('stats/totalbelanja/sosial-ekonomi', ['as' => 'stats.belanja.sosialekonomi', 'uses' => 'Guest\Report\TotalBelanjaSosialEkonomiController@index']);
        Route::get('stats/totalbelanja/jenispengeluaran', ['as' => 'stats.belanja.jenispengeluaran', 'uses' => 'Guest\Report\TotalBelanjaJenisPengeluaranController@index']);
        Route::get('stats/totalbelanja/jenispengeluaran/lembaga', ['as' => 'stats.belanja.jenispengeluaran.lembaga', 'uses' => 'Guest\Report\TotalBelanjaJenisPengeluaranLembagaController@index']);
        Route::get('stats/totalbelanja/jenissumberdana', ['as' => 'stats.belanja.jenissumberdana', 'uses' => 'Guest\Report\TotalBelanjaJenisSumberDanaController@index']);
        Route::get('stats/totalbelanja/jenispenelitian', ['as' => 'stats.belanja.jenispenelitian', 'uses' => 'Guest\Report\TotalBelanjaJenisPenelitianController@index']);
        Route::get('stats/compare/intramural-ekstramural', ['as' => 'stats.compare.intramural.ekstramural', 'uses' => 'Guest\Report\CompareIntramuralEkstramuralController@index']);
        Route::get('stats/totalbelanja/ekstramural/pelaksana', ['as' => 'stats.totalbelanja.ekstramural.pelaksana', 'uses' => 'Guest\Report\PelaksanaBelanjaEkstramuralController@index']);
        Route::get('stats/personil/klasifikasi', ['as' => 'stats.personil.klasifikasi', 'uses' => 'Guest\Report\PersonilKlasifikasiController@index']);
        Route::get('stats/personil/tingkat-pendidikan', ['as' => 'stats.personil.tingkatpendidikan', 'uses' => 'Guest\Report\PersonilTingkatPendidikanController@index']);
        Route::get('stats/personil/gender', ['as' => 'stats.personil.gender', 'uses' => 'Guest\Report\PersonilGenderController@index']);
        Route::get('stats/personil/peneliti/tingkat-pendidikan/gender', ['as' => 'stats.personil.peneliti.tingkatpendidikan.gender', 'uses' => 'Guest\Report\Personil\Peneliti\TingkatPendidikanGenderController@index']);
        Route::get('stats/personil/teknisi/tingkat-pendidikan/gender', ['as' => 'stats.personil.teknisi.tingkatpendidikan.gender', 'uses' => 'Guest\Report\Personil\Teknisi\TingkatPendidikanGenderController@index']);
        Route::get('stats/personil/staffpendukung/tingkat-pendidikan/gender', ['as' => 'stats.personil.staffpendukung.tingkatpendidikan.gender', 'uses' => 'Guest\Report\Personil\Staffpendukung\TingkatPendidikanGenderController@index']);
        Route::get('stats/personil/peneliti/jabatan-fungsional', ['as' => 'stats.personil.peneliti.jabatanfungsional', 'uses' => 'Guest\Report\Personil\Peneliti\JabatanFungsionalController@index']);
        Route::get('stats/personil/peneliti/bidang-ilmu', ['as' => 'stats.personil.peneliti.bidangilmu', 'uses' => 'Guest\Report\Personil\Peneliti\BidangIlmuController@index']);
        Route::get('stats/peneliti-luar', ['as' => 'stats.penelitiluar', 'uses' => 'Guest\Report\PenelitiLuarController@index']);
        Route::get('stats/paten', ['as' => 'stats.paten', 'uses' => 'Guest\Report\PatenSektorPemerintahController@index']);
        Route::get('stats/paten-sederhana', ['as' => 'stats.patensederhana', 'uses' => 'Guest\Report\PatenSederhanaSektorPemerintahController@index']);
    });

    Route::get('stats/puslit', ['as' => 'puslit', 'uses' => 'PuslitController@index']);
    Route::get('stats/puslit/lembaga/{idLembaga}', ['as' => 'puslit.lembaga', 'uses' => 'PuslitController@lembaga']);

    # Correspondent Frontend
    Route::group(['middleware' => ['\App\Http\Middleware\CorrespondentPrivilegeMiddleware']], function () {
        Route::resource('correspondent/profile', 'Correspondent\ProfileController', ['only' => [
            'store', 'index'
        ]]);

        // Draft
        Route::resource('correspondent/draft', 'Correspondent\SurveyDraftController', ['only' => [
            'store', 'index'
        ]]);
//        Route::get('correspondent/draft/data', ['as' => 'respondent.draft.data', 'uses' => 'Correspondent\SurveyDraftController@draftdata']);
//        Route::get('correspondent/draft/status', ['as' => 'respondent.draft.status', 'uses' => 'Correspondent\SurveyDraftController@draftstatus']);

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