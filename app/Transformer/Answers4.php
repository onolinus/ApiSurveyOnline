<?php
namespace App\Transformer;


use App\Answers4 as ModelAnswers4;
use League\Fractal;

class Answers4 extends Fractal\TransformerAbstract
{
    public function transform(ModelAnswers4 $answers4)
    {
        return [
            'status' => $answers4->status,
            'comment' => $answers4->status_comment,
            'content' => [
                'belanja_pegawai_upah' => doubleval($answers4->belanja_pegawai_upah),
                'belanja_modal_properti' => doubleval($answers4->belanja_modal_properti),
                'belanja_modal_mesin' => doubleval($answers4->belanja_modal_mesin),
                'belanja_operasional_maintenance' => doubleval($answers4->belanja_operasional_maintenance),
            ],
        ];
    }
}