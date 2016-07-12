<?php

namespace app\Libraries\Questions;


use PluginCommonSurvey\Libraries\SocioEconomics;
use PluginSimpleValidate\Field;

class Question6 extends AbstractQuestion{

    CONST NUMBER = 5;
    CONST CHAPTER_NUMBER = 2;

    private $persentase_dana = [];

    /**
     * @var SocioEconomics
     */
    private $socioEconomics;

    public function __construct(SocioEconomics $socioEconomics = null)
    {
        $this->socioEconomics = is_null($socioEconomics) ? SocioEconomics::getInstance() : $socioEconomics;
    }

    public function getAnswer()
    {
        return [
            'persentase_dana' => $this->persentase_dana,
            'total_percentage' => $this->getTotalPercentage()
        ];
    }


    public function setPersentaseDana($kode_penelitian, $percentage)
    {
        $this->persentase_dana[$kode_penelitian] = $percentage;
        return $this;
    }

    private function getTotalPercentage(){
        $total = 0;

        foreach($this->persentase_dana as $kode_penelitian => $percentage){
            $total += $percentage;
        }

        return $total;
    }

    public function setValidationRules()
    {
        $this->validator->addField((new Field('persentase_dana', $this->persentase_dana, 'Persentase Dana'))->min(1));
        foreach($this->persentase_dana as $kode_penelitian => $percentage){
            $this->validator->addField((new Field('persentase_dana.' . $kode_penelitian, $percentage, 'Persentase Dana : ' . $kode_penelitian))->is_required()->is_true($this->socioEconomics->isExistCode($kode_penelitian), 'Kode Penelitian tidak valid')->is_numeric()->is_natural_no_zero());
        }
        $this->validator->addField((new Field('total_percentage', $this->getTotalPercentage(), 'Total Persentase Realisasi Anggaran'))->is_required()->is_integer()->exact_length(100));
    }
}