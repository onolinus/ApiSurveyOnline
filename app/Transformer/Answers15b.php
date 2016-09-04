<?php
namespace App\Transformer;

use App\Answers15b as ModelAnswers15b;
use Illuminate\Database\Eloquent\Collection;
use League\Fractal;

class Answers15b extends Fractal\TransformerAbstract
{
    public function transform(Collection $list_answers15b)
    {
        $data = [];

        /** @var ModelAnswers15b $answers15b */
        foreach($list_answers15b as $index=>$answers15b){
            if($index === 0){
                $data['id'] = $answers15b->id;
                $data['status'] = $answers15b->status;
                $data['comment'] = $answers15b->status_comment;
            }

            $data['data'][] = [
                'id' => $answers15b->id,
                'nama_jasa' => $answers15b->nama_jasa,
                'pengguna_jasa' => $answers15b->pengguna_jasa,
                'tahun' => intval($answers15b->tahun),
            ];
        }

        return $data;
    }
}