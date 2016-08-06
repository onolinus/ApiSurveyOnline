<?php
namespace App\Transformer;

use App\Lembaga as ModelLembaga;
use League\Fractal;

class Lembaga extends Fractal\TransformerAbstract
{
    public function transform(ModelLembaga $lembaga)
    {
        return [
            'id' => $lembaga->id,
            'name' => $lembaga->name,
            'type' => $lembaga->type,
        ];
    }
}