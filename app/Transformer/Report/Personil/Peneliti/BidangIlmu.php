<?php
namespace App\Transformer\Report\Personil\Peneliti;

use League\Fractal;


class BidangIlmu extends Fractal\TransformerAbstract
{
    public function transform(\stdClass $data)
    {
        return [
            $data->bidang_ilmu => [
                's1' => [
                    'value' => $data->s1,
                    'percentage' => $data->percentage_s1,
                ],
                's2' => [
                    'value' => $data->s2,
                    'percentage' => $data->percentage_s2,
                ],
                's3' => [
                    'value' => $data->s3,
                    'percentage' => $data->percentage_s3,
                ],
            ]
        ];
    }
}