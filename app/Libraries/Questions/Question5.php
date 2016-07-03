<?php

namespace app\Libraries\Questions;

use function app\Helper\Questions\Chapter\getChaptersData;

class Question5 extends AbstractQuestion{

    CONST NUMBER = 5;
    CONST CHAPTER_NUMBER = 2;

    private $dana = [];

    public function getAnswer()
    {
        return [
            'dana' => $this->dana,
            'total_percentage' => $this->getPercentageTotal()
        ];
    }


    public function setPersentaseDana($kode_penelitian, $percentage)
    {
        $this->dana[$kode_penelitian] = $percentage;
        return $this;
    }

    private function getPercentageTotal(){
        $total = 0;

        foreach($this->dana as $kode_penelitian => $percentage){
            $total += $percentage;
        }

        return $total;
    }

    public function getRules()
    {
        $rules = [];

        foreach($this->dana as $kode_penelitian => $percentage){
            $rules['dana.' . $kode_penelitian] = 'required|numeric|max:100';
        }

        $rules['total_percentage'] = 'required|numeric|size:100';

        return $rules;
    }
}