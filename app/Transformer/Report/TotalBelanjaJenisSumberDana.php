<?php
namespace App\Transformer\Report;

use Illuminate\Support\Collection;
use League\Fractal;

class TotalBelanjaJenisSumberDana extends Fractal\TransformerAbstract
{
    public function transform(Collection $data)
    {
        $dipa = $data['dipa'];
        $nondipa = $data['nondipa'];
        $compare = $data['compare'];

        return [
            'dipa' => [
                'percentage' => doubleval($compare->percentage_totaldipa),
                'value' => doubleval($compare->totaldipa),
                'data' => [
                    'dipa_danapemerintah' => [
                        'percentage' => doubleval($dipa->percentage_total_dipa_danapemerintah),
                        'value' => doubleval($dipa->total_dipa_danapemerintah)
                    ],
                    'dipa_pnbp_perusahaanswasta' => [
                        'percentage' => doubleval($dipa->percentage_total_dipa_pnbp_perusahaanswasta),
                        'value' => doubleval($dipa->total_dipa_pnbp_perusahaanswasta)
                    ],
                    'dipa_pnbp_instansipemerintah' => [
                        'percentage' => doubleval($dipa->percentage_total_dipa_pnbp_instansipemerintah),
                        'value' => doubleval($dipa->total_dipa_pnbp_instansipemerintah)
                    ],
                    'dipa_pnbp_swastanonprofit' => [
                        'percentage' => doubleval($dipa->percentage_total_dipa_pnbp_swastanonprofit),
                        'value' => doubleval($dipa->total_dipa_pnbp_swastanonprofit)
                    ],
                    'dipa_pnbp_luarnegeri' => [
                        'percentage' => doubleval($dipa->percentage_total_dipa_pnbp_luarnegeri),
                        'value' => doubleval($dipa->total_dipa_pnbp_luarnegeri)
                    ],
                    'dipa_phln' => [
                        'percentage' => doubleval($dipa->percentage_total_dipa_phln),
                        'value' => doubleval($dipa->total_dipa_phln)
                    ],
                ],
            ],
            'nondipa' => [
                'percentage' => doubleval($compare->percentage_totalnondipa),
                'value' => doubleval($compare->totalnondipa),
                'data' => [
                    'nondipa_insentif_ristekdikti' => [
                        'percentage' => doubleval($nondipa->percentage_total_nondipa_insentif_ristekdikti),
                        'value' => doubleval($nondipa->total_nondipa_insentif_ristekdikti),
                    ],
                    'nondipa_insentif_dalamnegeri' => [
                        'percentage' => doubleval($nondipa->percentage_total_nondipa_insentif_dalamnegeri),
                        'value' => doubleval($nondipa->total_nondipa_insentif_dalamnegeri),
                    ],
                    'nondipa_insentif_researchgrant' => [
                        'percentage' => doubleval($nondipa->percentage_total_nondipa_insentif_researchgrant),
                        'value' => doubleval($nondipa->total_nondipa_insentif_researchgrant),
                    ],
                ]
            ],
            'total' => doubleval($compare->total)
        ];
    }
}