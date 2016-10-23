<?php
namespace App\Transformer\Report\Personil\Staffpendukung;

use Illuminate\Support\Collection;
use League\Fractal;


class TingkatPendidikanGender extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        return [
            's1' => [
                'lakilaki' => [
                    'value' => doubleval($data->get('jumlah_staffpendukung_s1_l_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_staffpendukung_s1_l_personil_litbang')),
                ],
                'perempuan' => [
                    'value' => doubleval($data->get('jumlah_staffpendukung_s1_p_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_staffpendukung_s1_p_personil_litbang')),
                ],
            ],
            'd3' => [
                'lakilaki' => [
                    'value' => doubleval($data->get('jumlah_staffpendukung_d3_l_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_staffpendukung_d3_l_personil_litbang')),
                ],
                'perempuan' => [
                    'value' => doubleval($data->get('jumlah_staffpendukung_d3_p_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_staffpendukung_d3_p_personil_litbang')),
                ],
            ],
            'belowd3' => [
                'lakilaki' => [
                    'value' => doubleval($data->get('jumlah_staffpendukung_belowd3_l_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_staffpendukung_belowd3_l_personil_litbang')),
                ],
                'perempuan' => [
                    'value' => doubleval($data->get('jumlah_staffpendukung_belowd3_p_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_staffpendukung_belowd3_p_personil_litbang')),
                ],
            ],
        ];
    }
}