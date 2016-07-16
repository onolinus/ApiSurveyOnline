<?php
namespace App\Transformer;

use App\Questions as ModelQuestions;
use League\Fractal;

class Questions extends Fractal\TransformerAbstract
{
    public function transform(ModelQuestions $question)
    {
        return [
            'id' => $question->id,
            'chapter' => $question->chapter,
        ];
    }
}