<?php

namespace app\Libraries\Questions;

use function app\Helper\Questions\Chapter\getChaptersData;

class Question2 extends AbstractQuestion{

    CONST NUMBER = 2;
    CONST CHAPTER_NUMBER = 2;

    private $jumlah;

    public function __construct($jumlah = null)
    {
        $this->setJumlah($jumlah);
    }

    /**
     * @param mixed $jumlah
     */
    public function setJumlah($jumlah)
    {
        $this->jumlah = $jumlah;
        $this->postSetter();
        return $this;
    }

    public function getRules()
    {
        return [
            'jumlah' => 'required|numeric',
        ];
    }

    protected function getAnswer()
    {
        return [
            'jumlah' => $this->jumlah
        ];
    }
}