<?php

namespace App\Http\Controllers\Survey;

use App\Http\Middleware\AdminPrivilegeMiddleware;
use App\TraitCacheSurveyData;
use App\TraitFractalResponse;
use App\Http\Requests;
use App\Answers as ModelAnswers;
use Illuminate\Routing\Controller;

abstract class BaseController extends Controller
{
    use TraitFractalResponse;

    use TraitCacheSurveyData;


    public function show($id_answer){
        $answersNumberModel = call_user_func_array('\\App\\' . $this->getModelName() . '::answerId', [$id_answer])->first();

        if($answersNumberModel === null){
            return $this->response->errorNotFound([trans('validator.notfoundanswersdata', ['answersnumber' => 1])]);
        }

        /** @var ModelAnswers $answers */
        $answers = $answersNumberModel->Answers;
        $session_user_id = $this->getSessionUserID();

        if(intval($answers->validator_id) !== $session_user_id && $this->getSessionUserType() !== AdminPrivilegeMiddleware::USER_TYPE_ALLOWED){
            return $this->response->errorForbidden([trans('validator.forbiddenaccesstoanswersnumber')]);
        }

        return $answersNumberModel;
    }


    public function update($id_answer){

    }

    abstract protected function getModelName();
}
