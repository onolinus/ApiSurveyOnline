<?php

namespace app\Libraries\Questions;

use PluginSimpleValidate\Field;

class Question3 extends AbstractQuestion{

    CONST NUMBER = 3;
    CONST CHAPTER_NUMBER = 2;

    private $dipa, $dana_lainnya;

    private $dipa_keys = [
        'dana_pemerintah' => 'Dana dari Pemerintah',
        'PNBP' => 'PNBP',
        'PHLN' => 'PHLN'
    ];
    private $dana_lainnya_keys = [
        'perusahaan_swasta' => 'Perusahaan Swasta',
        'instansi_pemerintah' => 'Instansi Pemerintah',
        'swasta_non_profit' => 'Swasta non profit',
        'luar_negeri' => 'Dari Luar Negeri'
    ];

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
                if(array_key_exists($key, $this->dipa_keys)){
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
                if(array_key_exists($key, $this->dana_lainnya_keys)){
                    $this->dana_lainnya[$key] = $value;
                }
            }
        }

        $this->postSetter();
        return $this;
    }

    public function setValidationRules()
    {
        foreach($this->dipa_keys as $key => $label) {
            $value = isset($this->dipa[$key]) ? $this->dipa[$key] : null;
            $this->validator->addField((new Field('dipa.' . $key, $value, $label))->is_required()->is_numeric());
        }

        foreach($this->dana_lainnya_keys as $key => $label){
            $value = isset($this->dana_lainnya[$key]) ? $this->dana_lainnya[$key] : null;
            $this->validator->addField((new Field('dana_lainnya.' . $key, $value, $label))->is_required()->is_numeric());
        }
    }
}