<?php
namespace App\Transformer\Report\Personil\Peneliti;

use League\Fractal;


class JabatanFungsionalPerLembaga extends Fractal\TransformerAbstract
{
    public function transform(\stdClass $data)
    {
        return [
            'jumlah' => [
                'value' => intval($data->jumlah_peneliti_fungsional),
                'percentage' => doubleval($data->percentage),
            ],
            'lembaga' => [
                'id' => $data->id_lembaga,
                'nama' => $data->nama_lembaga,
                'tipe' => $data->tipe_lembaga,
            ]
        ];
    }
}