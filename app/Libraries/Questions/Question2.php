<?php

namespace app\Libraries\Questions;

use PluginSimpleValidate\Field;

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

    public function setValidationRules()
    {
        $this->validator
            ->addField((new Field('jumlah', $this->jumlah, 'Jumlah belanja kegiatan litbang'))->is_required()->is_numeric());
    }

    protected function getAnswer()
    {
        return [
            'jumlah' => $this->jumlah
        ];
    }
}