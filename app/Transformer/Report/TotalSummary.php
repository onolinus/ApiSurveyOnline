<?php
namespace App\Transformer\Report;

use Illuminate\Support\Collection;
use League\Fractal;

class TotalSummary extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        return [
            'lembaga' => intval($data->get('lembaga')),
            'correspondent' => intval($data->get('correspondent')),
            'answers' => intval($data->get('answers')),
        ];
    }
}