<?php
namespace App\Transformer\Report;

use Illuminate\Support\Collection;
use League\Fractal;

class ProdukBarang extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        $result = [];

        foreach($data as $item) {
            $result[intval($item->tahun)][$item->status] = [
                'value' => intval($item->jumlah),
                'percentage' => doubleval($item->percentage),
            ];
        }

        return $result;
    }
}