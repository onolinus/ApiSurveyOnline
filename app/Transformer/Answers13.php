<?php
namespace App\Transformer;

use App\Answers13 as ModelAnswers13;
use Illuminate\Database\Eloquent\Collection;
use League\Fractal;

class Answers13 extends Fractal\TransformerAbstract
{
    public function transform(Collection $list_answers13)
    {
        $data = [];

        /** @var ModelAnswers13 $answers13 */
        foreach($list_answers13 as $index=>$answers13){
            if($index === 0){
                $data['status'] = $answers13->status;
                $data['comment'] = $answers13->status_comment;
            }

            $data['data'][] = [
                'id' => $answers13->id,
                'nama_peneliti' => $answers13->nama_peneliti,
                'nama_seminar' => $answers13->nama_seminar,
                'negara_penyelenggara_seminar' => $answers13->negara_penyelenggara_seminar,
            ];
        }

        return $data;
    }
}