<?php

namespace app\Libraries\Questions;

use function app\Helper\Questions\Chapter\getChaptersData;
use PluginSimpleValidate\Validation;

abstract class AbstractQuestion implements InterfaceQuestion{
    /**
     * @var Validation
     */
    protected $validator;

    protected function resetValidator(){
        $this->validator = null;
    }

    protected function postSetter(){
        $this->resetValidator();
    }

    public function getChapterNumber(){
        return static::CHAPTER_NUMBER;
    }

    public function getChapterRomanicNumber(){
        return \app\Helper\Number\simple_romanic_number($this->getChapterNumber());
    }

    public function getNumber(){
        return static::NUMBER;
    }

    public function getChapterTitle(){
        return getChaptersData($this->getChapterNumber());
    }

    public function getErrors(){
        return $this->validator->getErrors();
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
        $this->validator = new Validation();

        $this->setValidationRules();

        $this->validator->run();

        return empty($this->validator->getErrors());
    }

    abstract protected function getAnswer();

    abstract public function setValidationRules();
}