<?php

namespace app\Libraries;

use app\Libraries\Questions\InterfaceQuestion;


class Survey{

    private $questions = [], $errors = [];

    CONST COUNT_QUEST = 5;

    private $bail = false;

    /**
     * @var self
     */
    private static $instance;

    /**
     * @var \Illuminate\Validation\Validator
     */
    protected $validator;

    public function __construct()
    {
        $this->setListOfQuestions();
    }

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function setListOfQuestions(){
        for($number = 1; $number <= self::COUNT_QUEST; $number++){
            $questionClassName = "\\app\\Libraries\\Questions\\Question" . $number;

            /** @var InterfaceQuestion $questionClassName */
            $question = new $questionClassName();

            $this->setQuestion($question);
        }

        return $this;
    }

    public function setBail($bail){
        $this->bail = boolval($bail);
        return $this;
    }

    public function validate(){
        $valid = true;

        /** @var InterfaceQuestion $question */
        foreach($this->questions as $number => $question){
            if(!$question->isValidAnswer()){
                $valid = false;

                $this->errors[$number] = $question->getErrors();

                if($this->bail === true){
                    return false;
                }
            }
        }

        return $valid;
    }

    public function isValid(){
        return empty($this->errors);
    }

    public function getErrors(){
        return $this->errors;
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