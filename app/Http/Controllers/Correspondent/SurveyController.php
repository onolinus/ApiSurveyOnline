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

    CONST CACHE_DRAFT_PREFIX = 'draft:user';


    private function getCacheKey(){
        return SurveyCacheKey::getInstance()->generateCacheKey(sprintf('%s:%d', self::CACHE_DRAFT_PREFIX, $this->getSessionUserID()), false);
    }

    private function saveDraftToCache($data){
        Cache::forever($this->getCacheKey(), $data);

        return $this;
    }

    private function getDraftFromCache(){
        if($data = Cache::get($this->getCacheKey())){
            return $data;
        }

        return [];
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $this->saveDraftToCache($data);

        return $this->response->setStatusCode(201)->withArray([
            'code' => Codes::SUCCESS,
            'message' => trans('survey successfully saved as draft')
        ]);
    }

    public function index(){
        return $this->response->withArray($this->getDraftFromCache());
    }
}
