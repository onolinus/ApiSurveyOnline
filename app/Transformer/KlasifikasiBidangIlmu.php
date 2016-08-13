<?php
namespace App\Transformer;

use App\KlasifikasiBidangIlmu as ModelKlasifikasiBidangIlmu;
use League\Fractal;

class KlasifikasiBidangIlmuTransformer extends Fractal\TransformerAbstract
{
    public function transform(ModelKlasifikasiBidangIlmu $bidangilmu)
    {
        return [
            'code' => $bidangilmu->code,
            'bidang_ilmu' => $bidangilmu->bidang_ilmu,
            'kelompok' => $bidangilmu->kelompok,
        ];
    }
}