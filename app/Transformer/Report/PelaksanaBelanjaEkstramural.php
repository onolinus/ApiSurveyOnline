<?php
namespace App\Transformer\Report;

use Illuminate\Support\Collection;
use League\Fractal;


class PelaksanaBelanjaEkstramural extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        return [
            'jumlah_peneliti_pemerintah' => [
                'percentage' => doubleval($data->get('percentage_jumlah_peneliti_pemerintah', 0)),
                'value' => intval($data->get('jumlah_peneliti_pemerintah', 0))
            ],
            'jumlah_peneliti_perguruantinggi' => [
                'percentage' => doubleval($data->get('percentage_jumlah_peneliti_perguruantinggi', 0)),
                'value' => intval($data->get('jumlah_peneliti_perguruantinggi', 0))
            ],
            'jumlah_peneliti_industri' => [
                'percentage' => doubleval($data->get('percentage_jumlah_peneliti_industri', 0)),
                'value' => intval($data->get('jumlah_peneliti_industri', 0))
            ],
            'jumlah_peneliti_lembagaswadaya' => [
                'percentage' => doubleval($data->get('percentage_jumlah_peneliti_lembagaswadaya', 0)),
                'value' => intval($data->get('jumlah_peneliti_lembagaswadaya', 0))
            ],
            'jumlah_peneliti_asing' => [
                'percentage' => doubleval($data->get('percentage_jumlah_peneliti_asing', 0)),
                'value' => intval($data->get('jumlah_peneliti_asing', 0))
            ],
        ];
    }
}