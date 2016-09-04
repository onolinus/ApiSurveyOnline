<?php
namespace App\Transformer;

use App\Answers11 as ModelAnswers11;
use Illuminate\Database\Eloquent\Collection;
use League\Fractal;

class Answers11 extends Fractal\TransformerAbstract
{
    public function transform(Collection $list_answers11)
    {
        $data = [];

        /** @var ModelAnswers11 $answers11 */
        foreach($list_answers11 as $index=>$answers11){
            if($index === 0){
                $data['status'] = $answers11->status;
                $data['comment'] = $answers11->status_comment;
            }

            $data['content'][] = [
                'id' => $answers11->id,
                'code' => $answers11->code,
                'nama_jurnal' => $answers11->nama_jurnal,
                'jumlah' => $answers11->jumlah,
                'links' => [
                    'researchfields' => route("researchfields.show", $answers11->code)
                ]
            ];
        }

        return $data;
    }
}