<?php
namespace App\Transformer\Report;

use Illuminate\Support\Collection;
use League\Fractal;

class TotalBelanjaJenisPenelitian extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        $result = $data->all();
        return [
            'penelitian_dasar' => [
                'percentage' => doubleval($data->get('percentage_penelitian_dasar')),
                'value' => doubleval($result['penelitian_dasar']),
            ],
            'penelitian_terapan' => [
                'percentage' => doubleval($data->get('percentage_penelitian_terapan')),
                'value' => doubleval($data->get('penelitian_terapan'))
            ],
            'pengembangan_eksperimental' => [
                'percentage' => doubleval($data->get('percentage_pengembangan_eksperimental')),
                'value' => doubleval($data->get('pengembangan_eksperimental'))
            ]
        ];
    }
}