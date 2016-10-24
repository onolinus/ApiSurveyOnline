<?php
namespace App\Transformer\Report;

use Illuminate\Support\Collection;
use League\Fractal;

class MakalahIlmiahLembaga extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        $result = [];

        foreach($data as $item) {
            $result[$item->area][$item->name] = [
                'value' => intval($item->jumlah),
                'percentage' => doubleval($item->percentage),
            ];
        }

        return $result;
    }
}