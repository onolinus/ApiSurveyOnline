<?php
namespace App\Transformer;

use App\SocioEconomics as ModelSocioEconomics;
use League\Fractal;

class SocioEconomicsTransformer extends Fractal\TransformerAbstract
{
    public function transform(ModelSocioEconomics $socioeconomics)
    {
        return [
            'code' => $socioeconomics->code,
            'division' => [
                'name' => $socioeconomics->division,
                'number' => $socioeconomics->division_number,
            ],
            'category' => $socioeconomics->category,
            'group' => $socioeconomics->group,
        ];
    }
}