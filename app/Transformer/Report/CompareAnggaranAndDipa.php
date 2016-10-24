<?php
namespace App\Transformer\Report;

use League\Fractal;


class CompareAnggaranAndDipa extends Fractal\TransformerAbstract
{
    public function transform(\stdClass $data)
    {
        return [
            $data->nama_lembaga => [
                'realisasi_anggaran' => doubleval($data->total_realisasi_anggaran),
                'dipa' => doubleval($data->total_dipa),
            ],
        ];
    }
}