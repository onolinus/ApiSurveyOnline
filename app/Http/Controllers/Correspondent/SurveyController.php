<?php
namespace App\Http\Controllers\Correspondent;

use App\Http\Controllers\Controller;
use app\Libraries\Survey;
use App\TraitFractalResponse;
use App\TraitSessionToken;
use App\Users;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Cache;
use PluginCommonSurvey\Libraries\Codes;
use PluginCommonSurvey\Libraries\SurveyCacheKey;
use App\Correspondents as CorrespondentsModel;

class SurveyController  extends Controller
{
    use TraitFractalResponse;

    use TraitSessionToken;

    CONST CACHE_DRAFT_DATA_PREFIX = 'survey:data:user';
    CONST CACHE_DRAFT_STATUS_PREFIX = 'survey:status:user';

    private function getDataCacheKey(){
        return SurveyCacheKey::getInstance()->generateCacheKey(sprintf('%s:%d', self::CACHE_DRAFT_DATA_PREFIX, $this->getSessionUserID()), false);
    }

    private function getStatusCacheKey(){
        return SurveyCacheKey::getInstance()->generateCacheKey(sprintf('%s:%d', self::CACHE_DRAFT_STATUS_PREFIX, $this->getSessionUserID()), false);
    }

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

//
//    private function getStatusDraftFromCache(){
//        if($status = Cache::get($this->getStatusCacheKey())){
//            return $status;
//        }
//
//        return [];
//    }

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

    private function removeDataSurveyFromCache(){
        return Cache::pull($this->getDataCacheKey());
    }

    private function getDataSurveyFromCache(){
        if($data = Cache::get($this->getDataCacheKey())){
            return $data;
        }

        $survey = new Survey();
        $data = $survey->getListAnswers();

        Cache::forever($this->getDataCacheKey(), $data);

        return $data;
    }

    public function surveydata(){
        return $this->response->withArray($this->getDataSurveyFromCache());
    }

    public function surveyDetail($userId){
        $survey = new Survey();

        return $this->response->withArray($survey->getListAnswersById($userId));
    }
//
//    public function surveystatus(){
//        return $this->response->withArray($this->getStatusDraftFromCache());
//    }

}
