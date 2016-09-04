<?php

namespace App\Http\Controllers\Survey;

use App\Http\Middleware\AdminPrivilegeMiddleware;
use App\TraitCacheSurveyData;
use App\TraitFractalResponse;
use App\Http\Requests;
use App\Answers as ModelAnswers;
use Illuminate\Routing\Controller;
use League\Fractal\TransformerAbstract;

abstract class BaseController extends Controller
{
    use TraitFractalResponse;

    use TraitCacheSurveyData;

    public function show($id_answer){
        /** @var ModelAnswers $answersModel */
        $answers = ModelAnswers::find($id_answer);

        if($answers === null){
            return $this->response->errorNotFound([trans('validator.notfoundanswersdata', ['answersnumber' => 1])]);
        }

        $answersNumberModel = $answers->{$this->getModelName()};

        if($answersNumberModel === null || count($answersNumberModel) === 0){
            return $this->response->errorNotFound([trans('validator.notfoundanswersdata', ['answersnumber' => $this->getModelName()])]);
        }

        if(intval($answers->validator_id) !== $this->getSessionUserID() && $this->getSessionUserType() !== AdminPrivilegeMiddleware::USER_TYPE_ALLOWED){
            return $this->response->errorForbidden([trans('validator.forbiddenaccesstoanswersnumber')]);
        }

        return $this->response->withItem($answersNumberModel, $this->getTransformers());
    }


    public function update($id_answer){

    }

    public function approve(){

    }

    abstract protected function getModelName();

    /**
     * @return TransformerAbstract
     */
    abstract protected function getTransformers();
}
