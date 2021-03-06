<?php
namespace App\Http\Controllers\Survey;

use App\Answers;
use App\Http\Controllers\Controller;
use App\TraitCacheSurveyData;
use App\TraitFractalResponse;
use PluginCommonSurvey\Libraries\Codes;

class AnswersController extends Controller
{
    use TraitFractalResponse;

    use TraitCacheSurveyData;

    /**
     * @var Answers
     */
    private $answers;

    private $error_message;

    private function preCheckAnswers($id_answer){
        /** @var Answers $answersModel */
        $this->answers = Answers::find($id_answer);

        if($this->answers === null){
            $this->error_message = $this->response->errorNotFound([trans('validator.notfoundanswers')]);
            return false;
        }

        if(intval($this->answers->validator_id) !== $this->getSessionUserID() && $this->getSessionUserType() !== 'admin'){
            $this->error_message = $this->response->errorForbidden([trans('validator.forbiddenaccesstoanswersnumber')]);
            return false;
        }

        return true;
    }

    public function approve($id){
        if($this->preCheckAnswers($id) === false){
            return $this->error_message;
        }

        $this->answers->status = Answers::STATUS_ANSWERS_VALIDATION_APPROVED;
        $this->answers->save();
        $this->removeDataSurveyFromCache($this->answers->id_correspondent);

        return $this->response->setStatusCode(201)->withArray([
            'code' => Codes::SUCCESS,
            'message' => trans('validator.successapprovesurvey')
        ]);
    }

    public function reject($id){
        if($this->preCheckAnswers($id) === false){
            return $this->error_message;
        }

        $this->answers->status = Answers::STATUS_ANSWERS_VALIDATION_REJECTED;
        $this->answers->save();
        $this->removeDataSurveyFromCache($this->answers->id_correspondent);

        return $this->response->setStatusCode(201)->withArray([
            'code' => Codes::SUCCESS,
            'message' => trans('validator.successrejectsurvey')
        ]);
    }
}
