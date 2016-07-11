<?php

namespace app\Libraries\Questions;

use app\Helper\Questions\Chapter;
use PluginSimpleValidate\Validation;

abstract class AbstractQuestion implements InterfaceQuestion{
    /**
     * @var Validation
     */
    protected $validator;

    CONST LANG = 'id';

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
        return Chapter\getChaptersData($this->getChapterNumber());
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
        $this->validator = new Validation(self::LANG);

        $this->setValidationRules();

        $this->validator->run();

        return empty($this->validator->getErrors());
    }

    abstract protected function getAnswer();

    abstract public function setValidationRules();
}