<?php
namespace App\Transformer;


use App\Answers8 as ModelAnswers8;
use Illuminate\Database\Eloquent\Collection;
use League\Fractal;

class Answers8 extends Fractal\TransformerAbstract
{
    public function transform(Collection $list_answers8)
    {
        $data = [];

        /** @var ModelAnswers8 $answers8 */
        foreach($list_answers8 as $index=>$answers8){
            if($index === 0){
                $data['id'] = $answers8->id;
                $data['status'] = $answers8->status;
                $data['comment'] = $answers8->status_comment;
            }

            $data['data'][] = [
                'id' => $answers8->id,
                'institusi' => $answers8->institusi,
                'jumlah_dana' => doubleval($answers8->jumlah_dana)
            ];
        }

        return $data;

    }
}