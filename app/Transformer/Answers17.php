<?php
namespace App\Transformer;

use App\Answers17 as ModelAnswers17;
use Illuminate\Database\Eloquent\Collection;
use League\Fractal;

class Answers17 extends Fractal\TransformerAbstract
{
    public function transform(Collection $list_answers17)
    {
        $data = [];

        /** @var ModelAnswers17 $answers17 */
        foreach($list_answers17 as $index=>$answers17){
            if($index === 0){
                $data['status'] = $answers17->status;
                $data['comment'] = $answers17->status_comment;
            }

            $data['data'][] = [
                'id' => $answers17->id,
                'lisensi' => intval($answers17->lisensi),
                'tahun' => intval($answers17->tahun),
                'nilai' => doubleval($answers17->nilai),
            ];
        }

        return $data;
    }
}