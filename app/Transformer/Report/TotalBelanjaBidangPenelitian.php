<?php
namespace App\Transformer\Report;

use League\Fractal;

class TotalBelanjaBidangPenelitian extends Fractal\TransformerAbstract
{
    public function transform(\stdClass $data)
    {
        return [
            $data->area => [
                'percentage' => doubleval($data->percentage),
                'value' => doubleval($data->jumlah),
            ],
        ];
    }
}