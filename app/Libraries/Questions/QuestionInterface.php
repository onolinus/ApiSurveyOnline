<?php

namespace Libraries\Questions;

interface Questions{
    public function getChapterNumber();

    public function getNumber();

    public function isValidAnswer($answer);

    public function getAnswer();
}