<?php
namespace App\Transformer;


use App\Answers3 as ModelAnswers3;
use League\Fractal;

class Answers3 extends Fractal\TransformerAbstract
{
    public function transform(ModelAnswers3 $answers3)
    {
        return [
            'id' => $answers3->id,
            'status' => $answers3->status,
            'comment' => $answers3->status_comment,
            'data' => [
                'dipa_danapemerintah' => doubleval($answers3->dipa_danapemerintah),
                'dipa_pnbp_perusahaanswasta' => doubleval($answers3->dipa_pnbp_perusahaanswasta),
                'dipa_pnbp_perusahaanswasta' => doubleval($answers3->dipa_pnbp_perusahaanswasta),
                'dipa_pnbp_instansipemerintah' => doubleval($answers3->dipa_pnbp_instansipemerintah),
                'dipa_pnbp_swastanonprofit' => doubleval($answers3->dipa_pnbp_swastanonprofit),
                'dipa_pnbp_luarnegeri' => doubleval($answers3->dipa_pnbp_luarnegeri),
                'dipa_phln' => doubleval($answers3->dipa_phln),
                'nondipa_insentif_ristekdikti' => doubleval($answers3->nondipa_insentif_ristekdikti),
                'nondipa_insentif_dalamnegeri' => doubleval($answers3->nondipa_insentif_dalamnegeri),
                'nondipa_insentif_researchgrant' => doubleval($answers3->nondipa_insentif_researchgrant),
            ],
        ];
    }
}