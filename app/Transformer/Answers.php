<?php
namespace App\Transformer;

use App\Answers as ModelAnswers;
use League\Fractal;

class Answers extends Fractal\TransformerAbstract
{
    public function transform(ModelAnswers $answers)
    {
        return [
            'id' => $answers->id,
            'status' => $answers->status,
            'correspondent' => [
                'id' => $answers->id_correspondent,
            ],
            'timestamp' => [
                'created' => $answers->created_at,
                'created_string' => $answers->created_at->toDayDateTimeString(),
                'updated' => $answers->updated_at,
                'updated_string' => $answers->updated_at->toDayDateTimeString(),
            ],
            'links' => [
                'self' => route('validator.survey.show', [$answers->id_correspondent])
            ],
            'relationships' => [
                'correspondent' => [
                    'links' => [
                        'related' => route('admin.correspondent.show', [$answers->id_correspondent])
                    ]
                ],
            ]
        ];
    }
}