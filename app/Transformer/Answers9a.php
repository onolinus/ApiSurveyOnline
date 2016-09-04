<?php
namespace App\Transformer;


use App\Answers9a as ModelAnswers9a;
use League\Fractal;

class Answers9a extends Fractal\TransformerAbstract
{
    public function transform(ModelAnswers9a $answers9a)
    {
        return [
            'status' => $answers9a->status,
            'comment' => $answers9a->status_comment,
            'content' => [
                'total_pegawai' => intval($answers9a->total_pegawai),
            ],
        ];
    }
}