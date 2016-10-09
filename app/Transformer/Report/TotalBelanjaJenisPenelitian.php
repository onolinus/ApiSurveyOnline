<?php
namespace App\Transformer\Report;

use Illuminate\Support\Collection;
use League\Fractal;

class TotalBelanjaJenisPenelitian extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        return [
            'penelitian_dasar' => [
                'percentage' => $data->get('percentage_penelitian_dasar'),
                'value' => doubleval($data->get('penelitian_dasar)')),
            ],
            'penelitian_terapan' => [
                'percentage' => $data->get('percentage_penelitian_terapan'),
                'value' => doubleval($data->get('penelitian_terapan'))
            ],
            'pengembangan_eksperimental' => [
                'percentage' => $data->get('percentage_pengembangan_eksperimental'),
                'value' => doubleval($data->get('pengembangan_eksperimental'))
            ]
        ];
    }
}