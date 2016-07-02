<?php

namespace app\Libraries;

use Illuminate\Support\Facades\Validator;
use app\Libraries\Questions\InterfaceQuestion;


class Survey{

    private $questions = [];

    private $errors = [];

    CONST COUNT_QUEST = 3;

    /**
     * @var \Illuminate\Validation\Validator
     */
    protected $validator;

    public function __construct()
    {
        $this->setListOfQuestions();
    }

    private function setListOfQuestions(){
        for($number = 1; $number <= self::COUNT_QUEST; $number++){
            /** @var InterfaceQuestion $questionClassName */
            $questionClassName = "\\app\\Libraries\\Questions\\Question" . $number;
            $this->setQuestion(new $questionClassName());
        }

        return $this;
    }

    public function validate($bail = false){
        $valid = true;

        /** @var InterfaceQuestion $question */
        foreach($this->questions as $question){
            if(!$question->isValidAnswer()){
                $valid = false;
                if($bail === true){
                    return false;
                }
            }
        }

        return $valid;
    }

    public function getErrors(){
        $errors = [];

        /** @var InterfaceQuestion $question */
        foreach($this->questions as $key=>$question){
            $errors[$key] = $question->getErrors();
        }

        return $errors;
    }


    public function getQuestions(){
        return true;
    }

    public function getRules(){
        return true;
    }

    public function saveAsDraft(){

    }

    public function save(){

    }

    public function setQuestion(InterfaceQuestion $question){
        $this->questions[$question->getNumber()] = $question;
        return $this;
    }
}