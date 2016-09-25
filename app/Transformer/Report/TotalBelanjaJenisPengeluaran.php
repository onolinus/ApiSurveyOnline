<?php
namespace App\Transformer\Report;

use League\Fractal;
use stdClass;

class TotalBelanjaJenisPengeluaran extends Fractal\TransformerAbstract
{
    public function transform(stdClass $data)
    {
        return [
            'data' => [
                'belanja_pegawai_upah' => [
                    'percentage' => $data->percentage_belanja_pegawai_upah,
                    'value' => doubleval($data->belanja_pegawai_upah),
                ],
                'belanja_modal_properti' => [
                    'percentage' => $data->percentage_belanja_modal_properti,
                    'value' => doubleval($data->belanja_modal_properti)
                ],
                'belanja_modal_mesin' => [
                    'percentage' => $data->percentage_belanja_modal_mesin,
                    'value' => doubleval($data->belanja_modal_mesin)
                ],
                'belanja_operasional_maintenance' => [
                    'percentage' => $data->percentage_belanja_operasional_maintenance,
                    'value' => doubleval($data->belanja_operasional_maintenance)
                ],
            ],
            'total' => doubleval($data->total)
        ];
    }
}