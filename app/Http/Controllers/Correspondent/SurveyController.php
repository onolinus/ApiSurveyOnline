<?php
namespace App\Http\Controllers\Correspondent;

use App\Http\Controllers\Controller;
use app\Libraries\Survey;
use App\TraitCacheSurveyData;
use App\TraitFractalResponse;
use Illuminate\Http\Request;
use App\Http\Requests;
use PluginCommonSurvey\Libraries\Codes;

class SurveyController  extends Controller
{
    use TraitFractalResponse;

    use TraitCacheSurveyData;

    private function runValidation(Request $request){
        // TODO : impelement validation
        return true;
    }

    private function saveToDatabase(Request $request){
        $survey = new Survey();
        if(!$survey->validate($request)){
            return $this->response->errorWrongArgs(trans('validation error happened'));
        }

        return $survey->save($request);
    }

    public function store(Request $request)
    {
        $this->saveToDatabase($request);

        $this->removeDataSurveyFromCache();

        return $this->response->setStatusCode(201)->withArray([
            'code' => Codes::SUCCESS,
            'message' => trans('survey.successsavesurvey')
        ]);
    }

//    public function index(){
//        return $this->response->withArray([
//                'data' => $this->getDataDraftFromCache(),
//                'status' => $this->getStatusDraftFromCache(),
//            ]
//        );
//    }

    public function surveydata(){
        return $this->response->withArray($this->getDataSurveyFromCache());
    }

//    public function surveystatus(){
//        return $this->response->withArray($this->getStatusDraftFromCache());
//    }

}
