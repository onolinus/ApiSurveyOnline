<?php

namespace app\Libraries\Questions;

use function app\Helper\Questions\Chapter\getChaptersData;
use Illuminate\Support\Facades\Validator;

abstract class AbstractQuestion implements InterfaceQuestions{
    /**
     * @var \Illuminate\Validation\Validator
     */
    protected $validator;

    protected function resetValidator(){
        $this->validator = null;
    }

    protected function postSetter(){
        $this->resetValidator();
    }

    public function getErrors(){
        return $this->validator->errors()->all();
    }

    public function getChapterNumber(){
        return static::CHAPTER_NUMBER;
    }

    public function getNumber(){
        return static::NUMBER;
    }

    public function getChapterTitle(){
        return getChaptersData($this->getChapterNumber());
    }

    public function getValidatedAnswer()
    {
        if($this->validator === null){
            throw new \Exception('You must run the `isValidAnswer` after update the attribute');
        }

        return $this->getAnswer();
    }

    public function isValidAnswer()
    {
        $this->validator = Validator::make($this->getAnswer(), $this->getRules());

        return !$this->validator->fails();
    }

    abstract protected function getAnswer();

    abstract public function getRules();
}