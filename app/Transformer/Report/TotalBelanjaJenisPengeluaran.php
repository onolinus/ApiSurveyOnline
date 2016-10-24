<?php
namespace App\Transformer\Report;

use Illuminate\Support\Collection;
use League\Fractal;

class TotalBelanjaJenisPengeluaran extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        $result = $data->all();
        return [
            'belanja_pegawai_upah' => [
                'percentage' => doubleval($data->get('percentage_belanja_pegawai_upah')),
                'value' => doubleval($result['belanja_pegawai_upah']),
            ],
            'belanja_modal_properti' => [
                'percentage' => doubleval($data->get('percentage_belanja_modal_properti')),
                'value' => doubleval($data->get('belanja_modal_properti'))
            ],
            'belanja_modal_mesin' => [
                'percentage' => doubleval($data->get('percentage_belanja_modal_mesin')),
                'value' => doubleval($data->get('belanja_modal_mesin'))
            ],
            'belanja_operasional_maintenance' => [
                'percentage' => doubleval($data->get('percentage_belanja_operasional_maintenance')),
                'value' => doubleval($data->get('belanja_operasional_maintenance'))
            ],
        ];
    }
}