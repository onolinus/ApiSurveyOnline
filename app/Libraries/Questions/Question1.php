<?php

namespace app\Libraries\Questions;


class Question1 extends AbstractQuestion{

    CONST NUMBER = 1;
    CONST CHAPTER_NUMBER = 1;

    private $total, $percentage;

    public function __construct($total = null, $percentage = null)
    {
        $this->setTotal($total)->setPercentage($percentage);
    }

    protected function getAnswer(){
        return [
            'total' => $this->total,
            'percentage' => $this->percentage,
        ];
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
        $this->postSetter();
        return $this;
    }

    /**
     * @param mixed $percentage
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;
        $this->postSetter();
        return $this;
    }

    public function getRules()
    {
        return [
            'total' => 'required|numeric',
            'percentage' => 'required|numeric|max:100',
        ];
    }
}