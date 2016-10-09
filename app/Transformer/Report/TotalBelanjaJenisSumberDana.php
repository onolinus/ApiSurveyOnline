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
                'dipa_danapemerintah' => [
                    'percentage' => $dipa->percentage_total_dipa_danapemerintah,
                    'value' => $dipa->total_dipa_danapemerintah
                ],
                'dipa_pnbp_perusahaanswasta' => [
                    'percentage' => $dipa->percentage_total_dipa_pnbp_perusahaanswasta,
                    'value' => $dipa->total_dipa_pnbp_perusahaanswasta
                ],
                'dipa_pnbp_instansipemerintah' => [
                    'percentage' => $dipa->percentage_total_dipa_pnbp_instansipemerintah,
                    'value' => $dipa->total_dipa_pnbp_instansipemerintah
                ],
                'dipa_pnbp_swastanonprofit' => [
                    'percentage' => $dipa->percentage_total_dipa_pnbp_swastanonprofit,
                    'value' => $dipa->total_dipa_pnbp_swastanonprofit
                ],
                'dipa_pnbp_luarnegeri' => [
                    'percentage' => $dipa->percentage_total_dipa_pnbp_luarnegeri,
                    'value' => $dipa->total_dipa_pnbp_luarnegeri
                ],
                'dipa_phln' => [
                    'percentage' => $dipa->percentage_total_dipa_phln,
                    'value' => $dipa->total_dipa_phln
                ],
            ],
            'nondipa' => [
                'nondipa_insentif_ristekdikti' => [
                    'percentage' => $nondipa->percentage_total_nondipa_insentif_ristekdikti,
                    'value' => $nondipa->total_nondipa_insentif_ristekdikti,
                ],
                'nondipa_insentif_dalamnegeri' => [
                    'percentage' => $nondipa->percentage_total_nondipa_insentif_dalamnegeri,
                    'value' => $nondipa->total_nondipa_insentif_dalamnegeri,
                ],
                'nondipa_insentif_researchgrant' => [
                    'percentage' => $nondipa->percentage_total_nondipa_insentif_researchgrant,
                    'value' => $nondipa->total_nondipa_insentif_researchgrant,
                ],

            ],
            'compare' => [
                'dipa' => [
                    'percentage' => $compare->percentage_totaldipa,
                    'value' => $compare->totaldipa
                ],
                'nondipa' => [
                    'percentage' => $compare->percentage_totalnondipa,
                    'value' => $compare->totalnondipa
                ]
            ]
        ];
    }
}