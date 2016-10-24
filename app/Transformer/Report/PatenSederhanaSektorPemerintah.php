<?php
namespace App\Transformer\Report;

use Illuminate\Support\Collection;
use League\Fractal;

class PatenSederhanaSektorPemerintah extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        return [
            '2013' => [
                [
                    'usulan' => [
                        'value' => intval($data->get('usulan_patensederhana_2013')),
                        'percentage' => doubleval($data->get('percentage_usulan_patensederhana_2013')),
                    ],
                    'disetujui' => [
                        'value' => intval($data->get('disetujui_patensederhana_2013')),
                        'percentage' => doubleval($data->get('percentage_disetujui_patensederhana_2013')),
                    ],
                    'terkomersialisasi' => [
                        'value' => intval($data->get('terkomersialisasi_patensederhana_2013')),
                        'percentage' => doubleval($data->get('percentage_terkomersialisasi_patensederhana_2013')),
                    ],
                ]
            ],
            '2014' => [
                [
                    'usulan' => [
                        'value' => intval($data->get('usulan_patensederhana_2014')),
                        'percentage' => doubleval($data->get('percentage_usulan_patensederhana_2014')),
                    ],
                    'disetujui' => [
                        'value' => intval($data->get('disetujui_patensederhana_2014')),
                        'percentage' => doubleval($data->get('percentage_disetujui_patensederhana_2014')),
                    ],
                    'terkomersialisasi' => [
                        'value' => intval($data->get('terkomersialisasi_patensederhana_2014')),
                        'percentage' => doubleval($data->get('percentage_terkomersialisasi_patensederhana_2014')),
                    ],
                ]
            ],
            '2015' => [
                [
                    'usulan' => [
                        'value' => intval($data->get('usulan_patensederhana_2015')),
                        'percentage' => doubleval($data->get('percentage_usulan_patensederhana_2015')),
                    ],
                    'disetujui' => [
                        'value' => intval($data->get('disetujui_patensederhana_2015')),
                        'percentage' => doubleval($data->get('percentage_disetujui_patensederhana_2015')),
                    ],
                    'terkomersialisasi' => [
                        'value' => intval($data->get('terkomersialisasi_patensederhana_2015')),
                        'percentage' => doubleval($data->get('percentage_terkomersialisasi_patensederhana_2015')),
                    ],
                ]
            ],
        ];
    }
}