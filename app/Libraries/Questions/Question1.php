<?php

namespace app\Libraries\Questions;

use function app\Helper\Questions\Chapter\getChaptersData;

use Illuminate\Support\Facades\Validator;

class Question1 implements InterfaceQuestions{

    CONST NUMBER = 1;
    CONST CHAPTER_NUMBER = 1;

    private $total, $percentage;

    public function __construct($total, $percentage)
    {
        $this->total = $total;
        $this->percentage = $percentage;
    }

    /**
     * @var \Illuminate\Validation\Validator
     */
    private $validator;

    public function getChapterNumber()
    {
        return self::CHAPTER_NUMBER;
    }

    public function getChapterTitle()
    {
        return getChaptersData(self::CHAPTER_NUMBER);
    }

    public function getNumber()
    {
        return self::NUMBER;
    }

    public function isValidAnswer()
    {
        $this->validator = Validator::make($this->getAnswer(), [
            'total' => 'required|numeric',
            'percentage' => 'required|numeric|max:100',
        ]);

        return !$this->validator->fails();
    }

    public function getErrors(){
        return $this->validator->errors()->all();
    }

    public function getAnswer()
    {
        return [
            'total' => $this->total,
            'percentage' => $this->percentage,
        ];
    }
}