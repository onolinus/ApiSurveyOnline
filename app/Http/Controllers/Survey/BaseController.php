<?php

namespace App\Http\Controllers\Survey;

use App\AnswersNumber;
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

    /**
     * @var AnswersNumber
     */
    protected $answersNumberModel;

    protected $error_message = null;

    private function preCheckAnswers($id_answer){
        /** @var ModelAnswers $answersModel */
        $answers = ModelAnswers::find($id_answer);

        if($answers === null){
            $this->error_message = $this->response->errorNotFound([trans('validator.notfoundanswersdata', ['answersnumber' => 1])]);
            return false;
        }

        $this->answersNumberModel = $answers->{$this->getModelName()};

        if($this->answersNumberModel === null || count($this->answersNumberModel) === 0){
            $this->error_message = $this->response->errorNotFound([trans('validator.notfoundanswersdata', ['answersnumber' => $this->getModelName()])]);
            return false;
        }

        if(intval($answers->validator_id) !== $this->getSessionUserID() && $this->getSessionUserType() !== AdminPrivilegeMiddleware::USER_TYPE_ALLOWED){
            $this->error_message = $this->response->errorForbidden([trans('validator.forbiddenaccesstoanswersnumber')]);
            return false;
        }

        return true;
    }

    public function show($id_answer){
        if($this->preCheckAnswers($id_answer) === false){
            return $this->error_message;
        }

        return $this->response->withItem($this->answersNumberModel, $this->getTransformers());
    }


    public function update($id_answer){
        if($this->preCheckAnswers($id_answer) === false){
            return $this->error_message;
        }
    }

    public function approve(){

    }

    abstract protected function getModelName();

    /**
     * @return TransformerAbstract
     */
    abstract protected function getTransformers();
}
