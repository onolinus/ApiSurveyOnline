<?php
namespace App\Transformer\Report;

use Illuminate\Support\Collection;
use League\Fractal;

class TotalBelanjaJenisSumberDana extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {

        return [
            $data
        ];
    }
}