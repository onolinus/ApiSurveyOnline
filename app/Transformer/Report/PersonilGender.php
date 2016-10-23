<?php
namespace App\Transformer\Report;

use Illuminate\Support\Collection;
use League\Fractal;

class PersonilGender extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        return [
            'lakilaki' => [
                'peneliti' => [
                    'percentage' => doubleval($data->get('percentage_jumlah_peneliti_lakilaki_personil_litbang')),
                    'value' => intval($data->get('jumlah_peneliti_lakilaki_personil_litbang')),
                ],
                'teknisi' => [
                    'percentage' => doubleval($data->get('percentage_jumlah_teknisi_lakilaki_personil_litbang')),
                    'value' => intval($data->get('jumlah_teknisi_lakilaki_personil_litbang')),
                ],
                'staffpendukung' => [
                    'percentage' => doubleval($data->get('percentage_jumlah_staffpendukung_lakilaki_personil_litbang')),
                    'value' => intval($data->get('jumlah_staffpendukung_lakilaki_personil_litbang')),
                ],
            ],
            'perempuan' => [
                'peneliti' => [
                    'percentage' => doubleval($data->get('percentage_jumlah_peneliti_perempuan_personil_litbang')),
                    'value' => intval($data->get('jumlah_peneliti_perempuan_personil_litbang')),
                ],
                'teknisi' => [
                    'percentage' => doubleval($data->get('percentage_jumlah_teknisi_perempuan_personil_litbang')),
                    'value' => intval($data->get('jumlah_teknisi_perempuan_personil_litbang')),
                ],
                'staffpendukung' => [
                    'percentage' => doubleval($data->get('percentage_jumlah_staffpendukung_perempuan_personil_litbang')),
                    'value' => intval($data->get('jumlah_staffpendukung_perempuan_personil_litbang')),
                ],
            ],
        ];
    }
}