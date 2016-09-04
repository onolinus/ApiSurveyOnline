<?php
namespace App\Transformer;


use App\Answers1 as ModelAnswers1;
use League\Fractal;

class Answers1 extends Fractal\TransformerAbstract
{
    public function transform(ModelAnswers1 $answers1)
    {
        return  [
            'status' => $answers1->status,
            'comment' => $answers1->status_comment,
            'content' => [
                'total' => doubleval($answers1->total),
                'percentage' => intval($answers1->percentage),
            ]
        ];
    }
}