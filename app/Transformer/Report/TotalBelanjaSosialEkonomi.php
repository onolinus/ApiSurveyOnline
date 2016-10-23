<?php
namespace App\Transformer\Report;

use League\Fractal;

class TotalBelanjaSosialEkonomi extends Fractal\TransformerAbstract
{
    public function transform(\stdClass $data)
    {
        return [
            $data->division => [
                'percentage' => doubleval($data->percentage),
                'value' => doubleval($data->jumlah),
            ],
        ];
    }
}