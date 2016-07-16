<?php
namespace App\Transformer;

use App\ResearchFields as ModelResearchFields;
use League\Fractal;

class ResearchFieldsTransformer extends Fractal\TransformerAbstract
{
    public function transform(ModelResearchFields $researchFields)
    {
        return [
            'code' => $researchFields->code,
            'subject' => $researchFields->subject,
            'area' => $researchFields->area,
            'sub_area' => $researchFields->sub_area,
        ];
    }
}