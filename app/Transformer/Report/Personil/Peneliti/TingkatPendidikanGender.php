<?php
namespace App\Transformer\Report\Personil\Peneliti;

use Illuminate\Support\Collection;
use League\Fractal;


class TingkatPendidikanGender extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        return [
            's1' => [
                'lakilaki' => [
                    'value' => doubleval($data->get('jumlah_peneliti_s1_l_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_peneliti_s1_l_personil_litbang')),
                ],
                'perempuan' => [
                    'value' => doubleval($data->get('jumlah_peneliti_s1_p_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_peneliti_s1_p_personil_litbang')),
                ],
            ],
            's2' => [
                'lakilaki' => [
                    'value' => doubleval($data->get('jumlah_peneliti_s2_l_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_peneliti_s2_l_personil_litbang')),
                ],
                'perempuan' => [
                    'value' => doubleval($data->get('jumlah_peneliti_s2_p_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_peneliti_s2_p_personil_litbang')),
                ],
            ],
            's3' => [
                'lakilaki' => [
                    'value' => doubleval($data->get('jumlah_peneliti_s3_l_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_peneliti_s3_l_personil_litbang')),
                ],
                'perempuan' => [
                    'value' => doubleval($data->get('jumlah_peneliti_s3_p_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_peneliti_s3_p_personil_litbang')),
                ],
            ],
        ];
    }
}