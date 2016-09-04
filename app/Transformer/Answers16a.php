<?php
namespace App\Transformer;

use App\Answers16a as ModelAnswers16a;
use Illuminate\Database\Eloquent\Collection;
use League\Fractal;

class Answers16a extends Fractal\TransformerAbstract
{
    public function transform(Collection $list_answers16a)
    {
        $data = [];

        /** @var ModelAnswers16a $answers16a */
        foreach($list_answers16a as $index=>$answers16a){
            if($index === 0){
                $data['id'] = $answers16a->id;
                $data['status'] = $answers16a->status;
                $data['comment'] = $answers16a->status_comment;
            }

            $data['data'][] = [
                'id' => $answers16a->id,
                'usulan_paten' => intval($answers16a->usulan_paten),
                'usulan_patensederhana' => intval($answers16a->usulan_patensederhana),
                'usulan_patensederhana' => intval($answers16a->usulan_patensederhana),
                'disetujui_paten' => intval($answers16a->disetujui_paten),
                'disetujui_patensederhana' => intval($answers16a->disetujui_patensederhana),
                'terkomersialisasi_paten' => intval($answers16a->terkomersialisasi_paten),
                'terkomersialisasi_patensederhana' => intval($answers16a->terkomersialisasi_patensederhana),
            ];
        }

        return $data;
    }
}