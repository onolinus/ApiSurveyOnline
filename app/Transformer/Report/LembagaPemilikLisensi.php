<?php
namespace App\Transformer\Report;

use League\Fractal;
use stdClass;

class LembagaPemilikLisensi extends Fractal\TransformerAbstract
{
    public function transform(stdClass $data)
    {
        return [
            'name' => $data->name,
            'value' => intval($data->jumlah),
            'percentage' => doubleval($data->percentage)
        ];
    }
}