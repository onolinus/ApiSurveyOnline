<?php
namespace App\Transformer\Report;

use Illuminate\Support\Collection;
use League\Fractal;

class PenelitiLuar extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        return [
            'pemerintah' => [
                'value' => intval($data->get('jumlah_peneliti_pemerintah')),
                'percentage' => doubleval($data->get('percentage_peneliti_pemerintah')),
            ],
            'perguruan_tinggi' => [
                'value' => intval($data->get('jumlah_peneliti_perguruantinggi')),
                'percentage' => doubleval($data->get('percentage_peneliti_perguruantinggi')),
            ],
            'industri' => [
                'value' => intval($data->get('jumlah_peneliti_industri')),
                'percentage' => doubleval($data->get('percentage_peneliti_industri')),
            ],
            'lembagaswadaya' => [
                'value' => intval($data->get('jumlah_peneliti_lembagaswadaya')),
                'percentage' => doubleval($data->get('percentage_peneliti_lembagaswadaya')),
            ],
            'asing' => [
                'value' => intval($data->get('jumlah_peneliti_asing')),
                'percentage' => doubleval($data->get('percentage_peneliti_asing')),
            ],
        ];
    }
}