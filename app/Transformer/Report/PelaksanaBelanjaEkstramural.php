<?php
namespace App\Transformer\Report;

use Illuminate\Support\Collection;
use League\Fractal;


class PelaksanaBelanjaEkstramural extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        return [
            'pemerintah' => [
                'percentage' => doubleval($data->get('percentage_jumlah_peneliti_pemerintah', 0)),
                'value' => intval($data->get('jumlah_peneliti_pemerintah', 0))
            ],
            'perguruantinggi' => [
                'percentage' => doubleval($data->get('percentage_jumlah_peneliti_perguruantinggi', 0)),
                'value' => intval($data->get('jumlah_peneliti_perguruantinggi', 0))
            ],
            'industri' => [
                'percentage' => doubleval($data->get('percentage_jumlah_peneliti_industri', 0)),
                'value' => intval($data->get('jumlah_peneliti_industri', 0))
            ],
            'lembagaswadaya' => [
                'percentage' => doubleval($data->get('percentage_jumlah_peneliti_lembagaswadaya', 0)),
                'value' => intval($data->get('jumlah_peneliti_lembagaswadaya', 0))
            ],
            'asing' => [
                'percentage' => doubleval($data->get('percentage_jumlah_peneliti_asing', 0)),
                'value' => intval($data->get('jumlah_peneliti_asing', 0))
            ],
        ];
    }
}