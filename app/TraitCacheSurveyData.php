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
    private $CACHE_SURVEY_DATA_PREFIX = 'survey:data:user';
    private $CACHE_SURVEY_STATUS_PREFIX = 'survey:status:user';

    private $CACHE_VALIDATOR_SURVEY_DATA_PREFIX = 'survey:data:validator:user';

    use TraitSessionToken;

    private function getDataCacheKey($user_id = null){
        return SurveyCacheKey::getInstance()->generateCacheKey(sprintf('%s:%d', $this->CACHE_SURVEY_DATA_PREFIX, $user_id === null ? $this->getSessionUserID() : $user_id), false);
    }

    private function getStatusCacheKey($user_id = null){
        return SurveyCacheKey::getInstance()->generateCacheKey(sprintf('%s:%d', $this->CACHE_SURVEY_STATUS_PREFIX, $user_id === null ? $this->getSessionUserID() : $user_id), false);
    }

    private function getValidatorDataCacheKey($user_id = null){
        return SurveyCacheKey::getInstance()->generateCacheKey(sprintf('%s:%d', $this->CACHE_VALIDATOR_SURVEY_DATA_PREFIX, $user_id === null ? $this->getSessionUserID() : $user_id), false);
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

    private function removeDataSurveyFromCache(){
        return Cache::pull($this->getDataCacheKey());
    }

}
