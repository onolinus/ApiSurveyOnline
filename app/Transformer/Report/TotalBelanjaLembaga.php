<?php
namespace App\Transformer\Report;

use League\Fractal;
use stdClass;

class TotalBelanjaLembaga extends Fractal\TransformerAbstract
{
    public function transform(stdClass $data)
    {
        return [
            'id' => $data->id,
            'name' => $data->name,
            'type' => $data->type,
            'total' => doubleval($data->total),
            'total_in_milyar' => doubleval($data->total) / 1000000000
        ];
    }
}