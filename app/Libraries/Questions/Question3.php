<?php

namespace app\Libraries\Questions;

use function app\Helper\Questions\Chapter\getChaptersData;

class Question3 extends AbstractQuestion{

    CONST NUMBER = 3;
    CONST CHAPTER_NUMBER = 2;

    private $dipa, $dana_lainnya;

    private $dipa_keys = ['dana_pemerintah', 'PNBP', 'PHLN'];
    private $dana_lainnya_keys = ['perusahaan_swasta', 'instansi_pemerintah', 'swasta_non_profit', 'luar_negeri'];

    public function __construct($dipa = null, $dana_lainnya = null)
    {
        $this->setDipa($dipa)->setDanaLainnya($dana_lainnya);
    }

    public function getAnswer()
    {
        return [
            'dipa' => $this->dipa,
            'dana_lainnya' => $this->dana_lainnya
        ];
    }

    /**
     * @param array $dipa
     */
    public function setDipa($dipa)
    {
        if(is_array($dipa)){
            foreach($dipa as $key => $value){
                if(in_array($key, $this->dipa_keys)){
                    $this->dipa[$key] = $value;
                }
            }
        }

        $this->postSetter();
        return $this;
    }

    /**
     * @param mixed $dana_lainnya
     */
    public function setDanaLainnya($dana_lainnya)
    {
        if(is_array($dana_lainnya)){
            foreach($dana_lainnya as $key => $value){
                if(in_array($key, $this->dana_lainnya_keys)){
                    $this->dana_lainnya[$key] = $value;
                }
            }
        }

        $this->postSetter();
        return $this;
    }

    public function getRules()
    {
        $rules = [];

        foreach($this->dipa_keys as $value) {
            $rules['dipa.' . $value] = 'required|numeric';
        }

        foreach($this->dana_lainnya_keys as $value){
            $rules['dana_lainnya.' . $value] = 'required|numeric';
        }

        return $rules;
    }
}