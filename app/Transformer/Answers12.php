<?php
namespace App\Transformer;

use App\Answers12 as ModelAnswers12;
use Illuminate\Database\Eloquent\Collection;
use League\Fractal;

class Answers12 extends Fractal\TransformerAbstract
{
    public function transform(Collection $list_answers12)
    {
        $data = [];

        /** @var ModelAnswers12 $answers12 */
        foreach($list_answers12 as $index=>$answers12){
            if($index === 0){
                $data['id'] = $answers12->id;
                $data['status'] = $answers12->status;
                $data['comment'] = $answers12->status_comment;
            }

            $data['data'][] = [
                'id' => $answers12->id,
                'code' => $answers12->code,
                'nama_jurnal' => $answers12->nama_jurnal,
                'jumlah' => $answers12->jumlah,
                'links' => [
                    'researchfields' => route("researchfields.show", $answers12->code)
                ]
            ];
        }

        return $data;
    }
}