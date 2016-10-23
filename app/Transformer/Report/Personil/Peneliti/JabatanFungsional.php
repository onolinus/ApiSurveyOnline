<?php
namespace App\Transformer\Report\Personil\Peneliti;

use Illuminate\Support\Collection;
use League\Fractal;


class JabatanFungsional extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        return [
            'fungsional' => [
                'value' => intval($data->get('jumlah_peneliti_fungsional')),
                'percentage' => doubleval($data->get('percentage_jumlah_peneliti_fungsional')),
            ],
            'nonfungsional' => [
                'value' => intval($data->get('jumlah_peneliti_nonfungsional')),
                'percentage' => doubleval($data->get('percentage_jumlah_peneliti_nonfungsional')),
            ],
            'fungsionalnonpeneliti' => [
                'value' => intval($data->get('jumlah_peneliti_fungsional_nonpeneliti')),
                'percentage' => doubleval($data->get('percentage_jumlah_peneliti_fungsional_nonpeneliti')),
            ],
        ];
    }
}