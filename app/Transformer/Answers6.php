<?php
namespace App\Transformer;


use App\Answers6 as ModelAnswers6;
use Illuminate\Database\Eloquent\Collection;
use League\Fractal;

class Answers6 extends Fractal\TransformerAbstract
{
    public function transform(Collection $list_answers6)
    {
        $data = [];

        /** @var ModelAnswers6 $answers6 */
        foreach($list_answers6 as $index=>$answers6){
            if($index === 0){
                $data['status'] = $answers6->status;
                $data['comment'] = $answers6->status_comment;
            }

            $data['content'][] = [
                'id' => $answers6->id,
                'code' => $answers6->code,
                'percentage' => doubleval($answers6->percentage),
                'links' => [
                    'socioeconomics' => route("socioeconomics.show", $answers6->code)
                ]
            ];
        }

        return $data;
    }
}