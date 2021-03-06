<?php
namespace App\Transformer;

use App\Lembaga as ModelLembaga;
use League\Fractal;

class Lembaga extends Fractal\TransformerAbstract
{
    public function transform(ModelLembaga $lembaga)
    {
        $detail_lembaga =  [
            'id' => $lembaga->id,
            'name' => $lembaga->name,
            'type' => $lembaga->type,
        ];


        if ($lembaga->usersCount)
            $detail_lembaga['count'] = $lembaga->usersCount;


        return $detail_lembaga;
    }
}