<?php
namespace App\Transformer;


use App\Answers7 as ModelAnswers7;
use League\Fractal;

class Answers7 extends Fractal\TransformerAbstract
{
    public function transform(ModelAnswers7 $answers7)
    {
        return [
            'id' => $answers7->id,
            'status' => $answers7->status,
            'comment' => $answers7->status_comment,
            'data' => [
                'penelitian_dasar' => doubleval($answers7->penelitian_dasar),
                'penelitian_terapan' => doubleval($answers7->penelitian_terapan),
                'pengembangan_eksperimental' => doubleval($answers7->pengembangan_eksperimental),
            ],
        ];
    }
}