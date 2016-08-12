<?php
namespace App\Http\Controllers\Correspondent;

use App\Http\Controllers\Controller;
use App\TraitFractalResponse;
use App\TraitSessionToken;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Cache;
use PluginCommonSurvey\Libraries\Codes;
use PluginCommonSurvey\Libraries\SurveyCacheKey;

class SurveyController  extends Controller
{
    use TraitFractalResponse;

    use TraitSessionToken;

    CONST CACHE_DRAFT_DATA_PREFIX = 'draft:data:user';
    CONST CACHE_DRAFT_STATUS_PREFIX = 'draft:status:user';


    private function getDataCacheKey(){
        return SurveyCacheKey::getInstance()->generateCacheKey(sprintf('%s:%d', self::CACHE_DRAFT_DATA_PREFIX, $this->getSessionUserID()), false);
    }

    private function getStatusCacheKey(){
        return SurveyCacheKey::getInstance()->generateCacheKey(sprintf('%s:%d', self::CACHE_DRAFT_STATUS_PREFIX, $this->getSessionUserID()), false);
    }

    private function saveDraftToCache($data, $status){
        Cache::forever($this->getDataCacheKey(), $data);
        Cache::forever($this->getStatusCacheKey(), $status);

        return $this;
    }

    private function getDataDraftFromCache(){
        if($data = Cache::get($this->getDataCacheKey())){
            return $data;
        }

        return [];
    }

    private function getStatusDraftFromCache(){
        if($status = Cache::get($this->getStatusCacheKey())){
            return $status;
        }

        return [];
    }

    public function store(Request $request)
    {
        $data = $request->data;
        $status = $request->questions_status;

        $this->saveDraftToCache($data, $status);

        return $this->response->setStatusCode(201)->withArray([
            'code' => Codes::SUCCESS,
            'message' => trans('survey.successsavetodraft')
        ]);
    }

    public function index(){
        return $this->response->withArray([
                'data' => $this->getDataDraftFromCache(),
                'status' => $this->getStatusDraftFromCache(),
            ]
        );
    }

    public function draftdata(){
        return $this->response->withArray($this->getDataDraftFromCache());
    }

    public function draftstatus(){
        return $this->response->withArray($this->getStatusDraftFromCache());
    }

}
