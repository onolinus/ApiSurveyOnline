<?php

namespace App\Http\Controllers\Survey;

use App\Answers;
use App\AnswersNumber;
use App\Http\Middleware\AdminPrivilegeMiddleware;
use App\TraitCacheSurveyData;
use App\TraitFractalResponse;
use App\Http\Requests;
use App\Answers as ModelAnswers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use League\Fractal\TransformerAbstract;
use PluginCommonSurvey\Libraries\Codes;

abstract class BaseController extends Controller
{
    use TraitFractalResponse;

    use TraitCacheSurveyData;

    /**
     * @var AnswersNumber|Collection
     */
    protected $answersNumberModel;

    /**
     * @var Answers
     */
    protected $answers;

    protected $error_message = null;

    private function preCheckAnswers($id_answer){
        /** @var ModelAnswers $answersModel */
        $this->answers = ModelAnswers::find($id_answer);

        if($this->answers === null){
            $this->error_message = $this->response->errorNotFound([trans('validator.notfoundanswersdata', ['answersnumber' => 1])]);
            return false;
        }

        $this->answersNumberModel = $this->answers->{$this->getModelName()};

        if($this->answersNumberModel === null || count($this->answersNumberModel) === 0){
            $this->error_message = $this->response->errorNotFound([trans('validator.notfoundanswersdata', ['answersnumber' => $this->getModelName()])]);
            return false;
        }

        if(intval($this->answers->validator_id) !== $this->getSessionUserID() && $this->getSessionUserType() !== AdminPrivilegeMiddleware::USER_TYPE_ALLOWED){
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

    public function approve($id_answer){
        if($this->preCheckAnswers($id_answer) === false){
            return $this->error_message;
        }

        if($this->answersNumberModel instanceof Collection){
            foreach($this->answersNumberModel as $answersNumber){
                $answersNumber->status = Answers::STATUS_ANSWERS_VALIDATION_APPROVED;
                $answersNumber->save();
            }
        }else{
            $this->answersNumberModel->status = Answers::STATUS_ANSWERS_VALIDATION_APPROVED;
            $this->answersNumberModel->save();
        }

        return $this->response->setStatusCode(201)->withArray([
            'code' => Codes::SUCCESS,
            'message' => trans('validator.successapprovesurvey')
        ]);
    }

    public function reject($id_answer){
        if($this->preCheckAnswers($id_answer) === false){
            return $this->error_message;
        }

        if($this->answersNumberModel instanceof Collection){
            foreach($this->answersNumberModel as $answersNumber){
                $answersNumber->status = Answers::STATUS_ANSWERS_VALIDATION_REJECTED;
                $answersNumber->save();
            }
        }else{
            $this->answersNumberModel->status = Answers::STATUS_ANSWERS_VALIDATION_REJECTED;
            $this->answersNumberModel->save();
        }

        return $this->response->setStatusCode(201)->withArray([
            'code' => Codes::SUCCESS,
            'message' => trans('validator.successrejectsurvey')
        ]);

    }

    public function comment(Request $request, $id_answer){
        if($this->preCheckAnswers($id_answer) === false){
            return $this->error_message;
        }

        if($this->answersNumberModel instanceof Collection){
            foreach($this->answersNumberModel as $answersNumber){
                $answersNumber->status_comment = $request->comment;
                $answersNumber->save();
            }
        }else{
            $this->answersNumberModel->status_comment = $request->comment;
            $this->answersNumberModel->save();
        }

        return $this->response->setStatusCode(201)->withArray([
            'code' => Codes::SUCCESS,
            'message' => trans('validator.successcommentsurvey')
        ]);

    }

    abstract protected function getModelName();

    /**
     * @return TransformerAbstract
     */
    abstract protected function getTransformers();
}
