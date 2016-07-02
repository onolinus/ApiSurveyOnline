<?php

namespace app\Libraries\Questions;

interface InterfaceQuestion{
    public function getChapterNumber();

    public function getNumber();

    public function getChapterTitle();

    public function isValidAnswer();

    public function getErrors();

    public function getValidatedAnswer();

    public function getRules();
}