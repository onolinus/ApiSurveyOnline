<?php
namespace App\Transformer;

use App\Answers18 as ModelAnswers18;
use League\Fractal;

class Answers18 extends Fractal\TransformerAbstract
{
    public function transform(ModelAnswers18 $answers18)
    {
        return [
            'id' => $answers18->id,
            'status' => $answers18->status,
            'comment' => $answers18->status_comment,
            'data' => [
                'comment' => $answers18->comment,
            ],
        ];
    }
}