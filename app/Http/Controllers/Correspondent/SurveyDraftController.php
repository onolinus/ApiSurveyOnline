<?php
namespace App\Http\Controllers\Correspondent;

use App\Http\Controllers\Controller;
use App\TraitCacheSurveyData;
use App\TraitFractalResponse;
use App\TraitSessionToken;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Cache;
use PluginCommonSurvey\Libraries\Codes;
use PluginCommonSurvey\Libraries\SurveyCacheKey;

class SurveyDraftController  extends Controller
{
    use TraitFractalResponse;

    use TraitCacheSurveyData;

    private function saveDraftToCache($data, $status){
        Cache::forever($this->getDraftDataCacheKey(), $data);
        Cache::forever($this->getDraftStatusCacheKey(), $status);

        return $this;
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

//    public function draftdata(){
//        return $this->response->withArray($this->getDataDraftFromCache());
//    }
//
//    public function draftstatus(){
//        return $this->response->withArray($this->getStatusDraftFromCache());
//    }

}
