<?php
namespace App\Http\Controllers\Correspondent;

use App\Correspondents as CorrespondentsModel;
use App\Http\Controllers\Controller;
use App\TraitFractalResponse;
use App\TraitSessionToken;
use App\Transformer\CorrespondentTransformer;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Cache;
use PluginCommonSurvey\Libraries\Codes;
use PluginCommonSurvey\Libraries\SurveyCacheKey;

class SurveyController extends Controller
{
    use TraitFractalResponse;

    use TraitSessionToken;

    CONST CACHE_DRAFT_PREFIX_NAME = 'draft:respondent';

    private function getSurveyDraftCacheKey(){
        return SurveyCacheKey::getInstance()->generateCacheKey(sprintf('%s:%s', self::CACHE_DRAFT_PREFIX_NAME, $this->getSessionUserID()), false);
    }

    private function saveDataAsDraft($data){
        Cache::forever($this->getSurveyDraftCacheKey(), $data);
        return $this;
    }

    private function getDataFromDraft(){
        if($data = Cache::get($this->getSurveyDraftCacheKey())){
            return $data;
        }

        return [];
    }

    public function store(Request $request)
    {
        var_dump($request->all()); die;
        $this->saveDataAsDraft($request->data);

        return $this->response->setStatusCode(201)->withArray([
            'code' => Codes::SUCCESS,
            'message' => trans('successfully saved as draft')
        ]);
    }

    public function index(){
        return $this->response->withArray($this->getDataFromDraft());
    }
}
