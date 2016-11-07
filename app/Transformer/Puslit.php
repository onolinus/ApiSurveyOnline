<?php
namespace App\Transformer;

use League\Fractal;

class Puslit extends Fractal\TransformerAbstract
{
    public function transform(\stdClass $puslit)
    {
        return [
            'id' => $puslit->puslit,
            'lembaga' => [
                'id' => intval($puslit->id),
                'name' => $puslit->name,
                'type' => $puslit->type,
            ],
            'alamat' => $puslit->alamat,
            'head' => [
                'nip' => $puslit->nip,
                'nama' => $puslit->approved_by_name,
            ]
        ];
    }
}