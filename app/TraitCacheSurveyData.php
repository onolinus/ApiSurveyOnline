<?php

namespace App;

use app\Libraries\Survey;
use Illuminate\Http\JsonResponse;
use PluginCommonSurvey\Libraries\SurveyCacheKey;
use Illuminate\Support\Facades\Cache;
use App\Transformer\AnswerDetail as AnswerDetailTransformer;
use App\Correspondents as CorrespondentsModel;

trait TraitCacheSurveyData
{
    private $CACHE_DRAFT_DATA_PREFIX = 'draft:data:user';
    private $CACHE_DRAFT_STATUS_PREFIX = 'draft:status:user';

    private $CACHE_SURVEY_DATA_PREFIX = 'survey:data:user';
    private $CACHE_SURVEY_STATUS_PREFIX = 'survey:status:user';

    private $CACHE_VALIDATOR_SURVEY_DATA_PREFIX = 'survey:data:validator:user';

    use TraitSessionToken;

    private function getDraftDataCacheKey($user_id = null){
        return SurveyCacheKey::getInstance()->generateCacheKey(sprintf('%s:%d', $this->CACHE_DRAFT_DATA_PREFIX, $user_id === null ? $this->getSessionUserID() : $user_id), false);
    }

    private function getDraftStatusCacheKey($user_id = null){
        return SurveyCacheKey::getInstance()->generateCacheKey(sprintf('%s:%d', $this->CACHE_DRAFT_STATUS_PREFIX, $user_id === null ? $this->getSessionUserID() : $user_id), false);
    }

    private function getDataCacheKey($user_id = null){
        return SurveyCacheKey::getInstance()->generateCacheKey(sprintf('%s:%d', $this->CACHE_SURVEY_DATA_PREFIX, $user_id === null ? $this->getSessionUserID() : $user_id), false);
    }

    private function getStatusCacheKey($user_id = null){
        return SurveyCacheKey::getInstance()->generateCacheKey(sprintf('%s:%d', $this->CACHE_SURVEY_STATUS_PREFIX, $user_id === null ? $this->getSessionUserID() : $user_id), false);
    }

    private function getValidatorDataCacheKey($user_id = null){
        return SurveyCacheKey::getInstance()->generateCacheKey(sprintf('%s:%d', $this->CACHE_VALIDATOR_SURVEY_DATA_PREFIX, $user_id === null ? $this->getSessionUserID() : $user_id), false);
    }

    private function getDataDraftFromCache(){
        if($survey = $this->getDataSurveyFromCache()){
            return ['type' => 'survey', 'data' => $survey];
        }

        if($survey = Cache::get($this->getDraftDataCacheKey())){
            return ['type' => 'draft', 'data' => $survey];
        }

        return [];
    }

    private function getStatusDraftFromCache(){
        if($status = $this->getStatusSurveyFromCache()){
            return ['type' => 'survey', 'data' => $status];
        }

        if($status = Cache::get($this->getDraftStatusCacheKey())){
            return ['type' => 'draft', 'data' => $status];
        }

        return [];
    }

    private function getDataSurveyFromCache($user_id = null){
        $cacheKey = $this->getDataCacheKey($user_id);

        if($data = Cache::get($cacheKey)){
            return $data;
        }

        $survey = new Survey();
        $data = $survey->getListAnswers($user_id);

        Cache::forever($cacheKey, $data);

        return $data;
    }

    private function getStatusSurveyFromCache($user_id = null){
        $cacheKey = $this->getStatusCacheKey($user_id);

        if($data = Cache::get($cacheKey)){
            return $data;
        }

        $survey = new Survey();
        $data = $survey->getListAnswersStatus($user_id);

        Cache::forever($cacheKey, $data);

        return $data;
    }

    private function getValidatorDataSurveyFromCache($user_id = null){
        if($response = Cache::get($this->getValidatorDataCacheKey($user_id))){
            return $response;
        }

        /** @var Correspondents $correspondent */
        $correspondent = CorrespondentsModel::find($user_id);

        if($correspondent === null){
            return null;
        }

        $answers = $correspondent->Answers;

        if($answers === null){
            return null;
        }

        $apiResponse = $this->response;
        /**
         * @var \EllipseSynergie\ApiResponse\Laravel\Response $apiResponse
         * @var JsonResponse $response
         */
        $response = $apiResponse->withItem($answers, new AnswerDetailTransformer());

        Cache::forever($this->getValidatorDataCacheKey($user_id), $response->getData(true));

        return $response;
    }

    private function removeDataSurveyFromCache($user_id = null){
        Cache::pull($this->getDataCacheKey($user_id));
        Cache::pull($this->getStatusCacheKey($user_id));
        Cache::pull($this->getValidatorDataCacheKey($user_id));
    }

}
