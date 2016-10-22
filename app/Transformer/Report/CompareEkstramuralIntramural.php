<?php
namespace App\Transformer\Report;

use Illuminate\Support\Collection;
use League\Fractal;


class CompareEkstramuralIntramural extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        return [
            'intramural' => [
                'percentage' => $data->get('percentage_intramural'),
                'value' => doubleval($data->get('intramural')),
            ],
            'ekstramural' => [
                'percentage' => $data->get('percentage_ekstramural'),
                'value' => doubleval($data->get('ekstramural')),
            ],
        ];
    }
}