<?php
namespace App\Transformer\Report;

use Illuminate\Support\Collection;
use League\Fractal;


class PersonilKlasifikasi extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        return [
            'jumlah_peneliti_personil_litbang' => [
                'percentage' => doubleval($data->get('percentage_jumlah_peneliti_personil_litbang')),
                'value' => doubleval($data->get('jumlah_peneliti_personil_litbang')),
            ],
            'jumlah_teknisi_personil_litbang' => [
                'percentage' => doubleval($data->get('percentage_jumlah_teknisi_personil_litbang')),
                'value' => doubleval($data->get('jumlah_teknisi_personil_litbang')),
            ],
            'jumlah_staffpendukung_personil_litbang' => [
                'percentage' => doubleval($data->get('percentage_jumlah_staffpendukung_personil_litbang')),
                'value' => doubleval($data->get('jumlah_staffpendukung_personil_litbang')),
            ],
        ];
    }
}