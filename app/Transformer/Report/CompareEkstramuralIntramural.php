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
                'percentage' => doubleval($data->get('percentage_intramural')),
                'value' => doubleval($data->get('intramural')),
            ],
            'ekstramural' => [
                'percentage' => doubleval($data->get('percentage_ekstramural')),
                'value' => doubleval($data->get('ekstramural')),
            ],
        ];
    }
}