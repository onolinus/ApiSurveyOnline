<?php
namespace App\Transformer;

use App\Answers16b as ModelAnswers16b;
use League\Fractal;

class Answers16b extends Fractal\TransformerAbstract
{
    public function transform(ModelAnswers16b $answers16b)
    {
        return [
            'status' => $answers16b->status,
            'comment' => $answers16b->status_comment,
            'data' => [
                'jumlah_patenluarnegeri' => intval($answers16b->jumlah_patenluarnegeri),
            ],
        ];
    }
}