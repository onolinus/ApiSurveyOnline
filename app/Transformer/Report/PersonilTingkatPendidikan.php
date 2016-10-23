<?php
namespace App\Transformer\Report;

use Illuminate\Support\Collection;
use League\Fractal;


class PersonilTingkatPendidikan extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        return [
            's1' => [
                'peneliti' => [
                    'value' => intval($data->get('jumlah_s1_peneliti_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_s1_peneliti_personil_litbang')),
                ],
                'teknisi' => [
                    'value' => intval($data->get('jumlah_s1_teknisi_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_s1_teknisi_personil_litbang')),
                ],
                'staffpendukung' => [
                    'value' => intval($data->get('jumlah_s1_staffpendukung_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_s1_staffpendukung_personil_litbang')),
                ],
            ],
            's2' => [
                'peneliti' => [
                    'value' => intval($data->get('jumlah_s2_peneliti_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_s2_peneliti_personil_litbang')),
                ],
                'teknisi' => [
                    'value' => 0,
                    'percentage' => 0,
                ],
                'staffpendukung' => [
                    'value' => 0,
                    'percentage' => 0,
                ],
            ],
            's3' => [
                'peneliti' => [
                    'value' => intval($data->get('jumlah_s3_peneliti_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_s3_peneliti_personil_litbang')),
                ],
                'teknisi' => [
                    'value' => 0,
                    'percentage' => 0,
                ],
                'staffpendukung' => [
                    'value' => 0,
                    'percentage' => 0,
                ],
            ],
            'd3' => [
                'peneliti' => [
                    'value' => 0,
                    'percentage' => 0
                ],
                'teknisi' => [
                    'value' => intval($data->get('jumlah_d3_teknisi_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_d3_teknisi_personil_litbang')),
                ],
                'staffpendukung' => [
                    'value' => intval($data->get('jumlah_d3_staffpendukung_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_d3_staffpendukung_personil_litbang')),
                ],
            ],
            'belowd3' => [
                'peneliti' => [
                    'value' => 0,
                    'percentage' => 0
                ],
                'teknisi' => [
                    'value' => intval($data->get('jumlah_belowd3_teknisi_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_belowd3_teknisi_personil_litbang')),
                ],
                'staffpendukung' => [
                    'value' => intval($data->get('jumlah_belowd3_staffpendukung_personil_litbang')),
                    'percentage' => doubleval($data->get('percentage_jumlah_belowd3_staffpendukung_personil_litbang')),
                ],
            ],
        ];
    }
}