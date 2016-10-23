<?php
namespace App\Transformer\Report;

use League\Fractal;
use stdClass;

class CountUserLembaga extends Fractal\TransformerAbstract
{
    public function transform(stdClass $data)
    {
        return [
            'id' => intval($data->id),
            'name' => $data->name,
            'type' => $data->type,
            'count' => intval($data->count)
        ];
    }
}