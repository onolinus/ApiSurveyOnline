<?php
namespace App\Transformer\Report;

use League\Fractal;
use stdClass;

class TotalBelanjaJenisPengeluaranLembaga extends Fractal\TransformerAbstract
{
    public function transform(stdClass $data)
    {
        return [
            'id' => $data->id,
            'name' => $data->name,
            'type' => $data->type,
            'data' => [
                'belanja_pegawai_upah' => [
                    'percentage' => doubleval($data->percentage_belanja_pegawai_upah),
                    'value' => doubleval($data->belanja_pegawai_upah),
                ],
                'belanja_modal_properti' => [
                    'percentage' => doubleval($data->percentage_belanja_modal_properti),
                    'value' => doubleval($data->belanja_modal_properti)
                ],
                'belanja_modal_mesin' => [
                    'percentage' => doubleval($data->percentage_belanja_modal_mesin),
                    'value' => doubleval($data->belanja_modal_mesin)
                ],
                'belanja_operasional_maintenance' => [
                    'percentage' => doubleval($data->percentage_belanja_operasional_maintenance),
                    'value' => doubleval($data->belanja_operasional_maintenance)
                ],
            ],
            'total' => [
                'lembaga' => [
                    'percentage' => doubleval($data->percentage_total_per_lembaga),
                    'value' => doubleval($data->total_per_lembaga)
                ]
            ]
        ];
    }
}