<?php

namespace App;

use app\Libraries\Survey;
use PluginCommonSurvey\Libraries\SurveyCacheKey;
use Illuminate\Support\Facades\Cache;

trait TraitCacheSurveyData
{
    private $CACHE_DRAFT_DATA_PREFIX = 'survey:data:user';
    private $CACHE_DRAFT_STATUS_PREFIX = 'survey:status:user';

    use TraitSessionToken;

    private function getDataCacheKey($user_id = null){
        return SurveyCacheKey::getInstance()->generateCacheKey(sprintf('%s:%d', $this->CACHE_DRAFT_DATA_PREFIX, $user_id === null ? $this->getSessionUserID() : $user_id), false);
    }

    private function getStatusCacheKey($user_id = null){
        return SurveyCacheKey::getInstance()->generateCacheKey(sprintf('%s:%d', $this->CACHE_DRAFT_STATUS_PREFIX, $user_id === null ? $this->getSessionUserID() : $user_id), false);
    }

    private function getDataSurveyFromCache($user_id = null){
        if($data = Cache::get($this->getDataCacheKey($user_id))){
            return $data;
        }

        $survey = new Survey();
        $data = $survey->getListAnswers();

        Cache::forever($this->getDataCacheKey($user_id), $data);

        return $data;
    }

    private function removeDataSurveyFromCache(){
        return Cache::pull($this->getDataCacheKey());
    }

}
