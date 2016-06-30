<?php

namespace app\Libraries\Questions;

interface InterfaceQuestions{
    public function getChapterNumber();

    public function getNumber();

    public function getChapterTitle();

    public function isValidAnswer();

    public function getErrors();

    public function getValidatedAnswer();

    public function getRules();
}