<?php
namespace App\Transformer;

use App\Answers15a as ModelAnswers15a;
use Illuminate\Database\Eloquent\Collection;
use League\Fractal;

class Answers15a extends Fractal\TransformerAbstract
{
    public function transform(Collection $list_answers15a)
    {
        $data = [];

        /** @var ModelAnswers15a $answers15a */
        foreach($list_answers15a as $index=>$answers15a){
            if($index === 0){
                $data['status'] = $answers15a->status;
                $data['comment'] = $answers15a->status_comment;
            }

            $data['content'][] = [
                'id' => $answers15a->id,
                'nama_barang' => $answers15a->nama_barang,
                'terkomersialisasi' => intval($answers15a->terkomersialisasi),
                'tahun' => intval($answers15a->tahun),
            ];
        }

        return $data;
    }
}