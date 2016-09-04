<?php
namespace App\Transformer;

use App\Answers9c as ModelAnswers9c;
use Illuminate\Database\Eloquent\Collection;
use League\Fractal;

class Answers9c extends Fractal\TransformerAbstract
{
    public function transform(Collection $list_answers9c)
    {
        $data = [];

        /** @var ModelAnswers9c $answers9c */
        foreach($list_answers9c as $index=>$answers9c){
            if($index === 0){
                $data['id'] = $answers9c->id;
                $data['status'] = $answers9c->status;
                $data['comment'] = $answers9c->status_comment;
            }

            $data['data'][] = [
                'id' => $answers9c->id,
                's1_l' => intval($answers9c->s1_l),
                's1_p' => intval($answers9c->s1_p),
                's2_l' => intval($answers9c->s2_l),
                's2_p' => intval($answers9c->s2_p),
                's3_l' => intval($answers9c->s3_l),
                's3_p' => intval($answers9c->s3_p),
                'code' => $answers9c->code,
                'links' => [
                    'bidangilmu' => route("bidangilmu.show", $answers9c->code)
                ]
            ];
        }

        return $data;
    }
}