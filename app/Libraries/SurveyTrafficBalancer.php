<?php

namespace app\Libraries;

use App\Answers as AnswersModel;

class SurveyTrafficBalancer{

    private $validator_id;

    CONST USER_TYPE = 'validator';

    /**
     * @var SessionTokenAccessor
     */
    private $sessionTokenAccessor;

    public function __construct(SessionTokenAccessor $sessionTokenAccessor = null)
    {
        $this->sessionTokenAccessor = is_null($sessionTokenAccessor) ? SessionTokenAccessor::getInstance() : $sessionTokenAccessor;
        if($this->sessionTokenAccessor->getSessionUserType() !== self::USER_TYPE){
            throw new \Exception('User type must be validator');
        }
        $this->validator_id = $this->sessionTokenAccessor->getSessionUserID();
    }

    public function getAnswerTobeValidated(){
        if($answer = AnswersModel::ProsesValidasi($this->validator_id)->first()){
            return $answer;
        }

        $answers = AnswersModel::Available()->get();
        $rand = rand(0, count($answers) -1);
        /** @var AnswersModel $answer */
        $answer = $answers[$rand];

        $answer->status = AnswersModel::STATUS_ANSWERS_VALIDATION_PROGRESS;
        $answer->validator_id = $this->validator_id;
        $answer->save();

        return $answer;
    }
}