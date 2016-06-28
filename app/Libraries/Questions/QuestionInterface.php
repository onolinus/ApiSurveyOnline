<?php

namespace app\Libraries\Questions;

interface InterfaceQuestions{
    public function getChapterNumber();

    public function getNumber();

    public function getChapterTitle();

    public function isValidAnswer($answer);

    public function getErrors();

    public function getAnswer();
}