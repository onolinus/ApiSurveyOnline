<?php
namespace App\Transformer;

use App\Answers14 as ModelAnswers14;
use Illuminate\Database\Eloquent\Collection;
use League\Fractal;

class Answers14 extends Fractal\TransformerAbstract
{
    public function transform(Collection $list_answers14)
    {
        $data = [];

        /** @var ModelAnswers14 $answers14 */
        foreach($list_answers14 as $index=>$answers14){
            if($index === 0){
                $data['status'] = $answers14->status;
                $data['comment'] = $answers14->status_comment;
            }

            $data['content'][] = [
                'id' => $answers14->id,
                'nama_penerima_award' => $answers14->nama_penerima_award,
                'nama_award' => $answers14->nama_award,
                'institusi_pemberi_award' => $answers14->institusi_pemberi_award,
            ];
        }

        return $data;
    }
}