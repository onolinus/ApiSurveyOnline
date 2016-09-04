<?php
namespace App\Transformer;


use App\Answers2 as ModelAnswers2;
use League\Fractal;

class Answers2 extends Fractal\TransformerAbstract
{
    public function transform(ModelAnswers2 $answers2)
    {
        return [
            'id' => $answers2->id,
            'status' => $answers2->status,
            'comment' => $answers2->status_comment,
            'data' => [
                'jumlah' => doubleval($answers2->jumlah),
            ],
        ];
    }
}