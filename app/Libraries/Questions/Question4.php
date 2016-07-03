<?php

namespace app\Libraries\Questions;

use function app\Helper\Questions\Chapter\getChaptersData;

class Question4 extends AbstractQuestion{

    CONST NUMBER = 4;
    CONST CHAPTER_NUMBER = 2;

    private $belanja_pegawai, $belanja_modal, $belanja_operasional;

    private $belanja_pegawai_keys = ['gaji_upah_honor_proyek'];
    private $belanja_modal_keys = ['tanah_gedung_bangunan', 'kendaraan_mesin_peralatan'];
    private $belanja_operasional_keys = ['pemeliharaan', 'perbaikan'];

    public function __construct($belanja_pegawai = null, $belanja_modal = null, $belanja_operasional = null)
    {
        $this->setBelanjaPegawai($belanja_pegawai)->setBelanjaModal($belanja_modal)->setBelanjaOperasional($belanja_operasional);
    }

    public function getAnswer()
    {
        return [
            'belanja_pegawai' => $this->belanja_pegawai,
            'belanja_modal' => $this->belanja_modal,
            'belanja_operasional' => $this->belanja_operasional,
        ];
    }

    /**
     * @param $belanja_pegawai
     * @return $this
     */
    public function setBelanjaPegawai($belanja_pegawai)
    {
        if(is_array($belanja_pegawai)){
            foreach($belanja_pegawai as $key => $value){
                if(in_array($key, $this->belanja_pegawai_keys)){
                    $this->belanja_pegawai[$key] = $value;
                }
            }
        }

        $this->postSetter();
        return $this;
    }

    /**
     * @param $belanja_modal
     * @return $this
     */
    public function setBelanjaModal($belanja_modal)
    {
        if(is_array($belanja_modal)){
            foreach($belanja_modal as $key => $value){
                if(in_array($key, $this->belanja_modal_keys)){
                    $this->belanja_modal[$key] = $value;
                }
            }
        }

        $this->postSetter();
        return $this;
    }

    /**
     * @param $belanja_operasional
     * @return $this
     */
    public function setBelanjaOperasional($belanja_operasional)
    {
        if(is_array($belanja_operasional)){
            foreach($belanja_operasional as $key => $value){
                if(in_array($key, $this->belanja_operasional_keys)){
                    $this->belanja_operasional[$key] = $value;
                }
            }
        }

        $this->postSetter();
        return $this;
    }

    public function getRules()
    {
        $rules = [];

        foreach($this->belanja_pegawai_keys as $value){
            $rules['belanja_pegawai.' . $value] = 'required|numeric';
        }

        foreach($this->belanja_modal_keys as $value) {
            $rules['belanja_modal.' . $value] = 'required|numeric';
        }

        foreach($this->belanja_operasional_keys as $value) {
            $rules['belanja_operasional.' . $value] = 'required|numeric';
        }

        return $rules;
    }
}