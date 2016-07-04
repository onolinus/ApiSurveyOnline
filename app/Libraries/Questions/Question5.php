<?php

namespace app\Libraries\Questions;

use function app\Helper\Questions\Chapter\getChaptersData;
use Illuminate\Support\Facades\Validator;

class Question5 extends AbstractQuestion{

    CONST NUMBER = 5;
    CONST CHAPTER_NUMBER = 2;

    private $dana = [];

    public function getAnswer()
    {
        return [
            'dana' => $this->dana,
            'count_dana' => count($this->dana),
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

    public function isValidAnswer()
    {
        /** @var  \Illuminate\Validation\Validator */
        $this->validator = Validator::make($this->getAnswer(), $this->getRules());

        $this->validator->sometimes('total_percentage', 'required|numeric|size:100', function($input) {
            return $this->getPercentageTotal() > 0;
        });

        return !$this->validator->fails();
    }


    public function getRules()
    {
        $rules = [];

        foreach($this->dana as $kode_penelitian => $percentage){
            $rules['dana.' . $kode_penelitian] = 'required|numeric|max:100';
        }

        $rules['count_dana'] = 'required|numeric|min:1';

        return $rules;
    }
}