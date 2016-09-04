<?php
namespace App\Transformer;


use App\Answers5 as ModelAnswers5;
use Illuminate\Database\Eloquent\Collection;
use League\Fractal;

class Answers5 extends Fractal\TransformerAbstract
{
    public function transform(Collection $list_answers5)
    {
        $data = [];

        /** @var ModelAnswers5 $answers5 */
        foreach($list_answers5 as $index=>$answers5){
            if($index === 0){
                $data['id'] = $answers5->id;
                $data['status'] = $answers5->status;
                $data['comment'] = $answers5->status_comment;
            }

            $data['data'][] = [
                'id' => $answers5->id,
                'code' => $answers5->code,
                'percentage' => doubleval($answers5->percentage),
                'links' => [
                    'researchfields' => route("researchfields.show", $answers5->code)
                ]
            ];
        }

        return $data;
    }
}