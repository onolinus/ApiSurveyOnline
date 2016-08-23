<?php

namespace app\Libraries;

use App\Answers18;
use App\Correspondents;
use App\TraitSessionToken;
use Illuminate\Http\Request;
use app\Libraries\Questions\InterfaceQuestion;
use App\Answers10;
use App\Answers11;
use App\Answers12;
use App\Answers13;
use App\Answers14;
use App\Answers15a;
use App\Answers15b;
use App\Answers16a;
use App\Answers16b;
use App\Answers17;
use App\Answers9c;
use App\Answers;
use App\Answers1;
use App\Answers2;
use App\Answers3;
use App\Answers4;
use App\Answers5;
use App\Answers6;
use App\Answers7;
use App\Answers8;
use App\Answers9a;
use App\Answers9b;
use DB;

class SurveyDb{

    public function getListAnswers($user_id){
        /** @var Correspondents $correspondent */
        $correspondent = Correspondents::find($user_id);
        $answers = $correspondent->Answers;
        $data = [];

        $this->getAnswers1($answers, $data);
        $this->getAnswers2($answers, $data);
        $this->getAnswers3($answers, $data);
        $this->getAnswers4($answers, $data);
        $this->getAnswers5($answers, $data);
        $this->getAnswers6($answers, $data);
        $this->getAnswers7($answers, $data);
        $this->getAnswers8($answers, $data);
        $this->getAnswers9a($answers, $data);
        $this->getAnswers9b($answers, $data);
//        $this->getAnswers9c($answers, $data);
//        $this->getAnswers10($answers, $data);
//        $this->getAnswers11($answers, $data);
//        $this->getAnswers12($answers, $data);
//        $this->getAnswers13($answers, $data);
//        $this->getAnswers14($answers, $data);
//        $this->getAnswers15a($answers, $data);
//        $this->getAnswers15b($answers, $data);
//        $this->getAnswers16a($answers, $data);
//        $this->getAnswers16b($answers, $data);
//        $this->getAnswers17($answers, $data);
//        $this->getAnswers18($answers, $data);

        return $data;
    }

    private function number_format($number){
        return number_format(floatval($number), 2, ',', '.');
    }

    private function getAnswers1(Answers $answers, &$data){
        /** @var Answers1 $answers1 */
        $answers1 = $answers->Answers1;

        $data['answer1_total'] = $this->number_format($answers1->total);
        $data['answer1_percentage'] = $this->number_format($answers1->percentage);
    }

    private function getAnswers2(Answers $answers, &$data){
        /** @var Answers2 $answers2 */
        $answers2 = $answers->Answers2;

        $data['answer2_jumlah'] = $this->number_format($answers2->jumlah);
    }

    private function getAnswers3(Answers $answers, &$data){
        /** @var Answers3 $answers3 */
        $answers3 = $answers->Answers3;

        $data['answer3_dipa_danapemerintah'] = $this->number_format($answers3->dipa_danapemerintah);
        $data['answer3_dipa_pnbp_perusahaanswasta'] = $this->number_format($answers3->dipa_pnbp_perusahaanswasta);
        $data['answer3_dipa_pnbp_instansipemerintah'] = $this->number_format($answers3->dipa_pnbp_instansipemerintah);
        $data['answer3_dipa_pnbp_swastanonprofit'] = $this->number_format($answers3->dipa_pnbp_swastanonprofit);
        $data['answer3_dipa_pnbp_luarnegeri'] = $this->number_format($answers3->dipa_pnbp_luarnegeri);
        $data['answer3_dipa_phln'] = $this->number_format($answers3->dipa_phln);
        $data['answer3_nondipa_insentif_ristekdikti'] = $this->number_format($answers3->nondipa_insentif_ristekdikti);
        $data['answer3_nondipa_insentif_dalamnegeri'] = $this->number_format($answers3->nondipa_insentif_dalamnegeri);
        $data['answer3_nondipa_insentif_researchgrant'] = $this->number_format($answers3->nondipa_insentif_researchgrant);
    }

    private function getAnswers4(Answers $answers, &$data){
        /** @var Answers4 $answers4 */
        $answers4 = $answers->Answers4;

        $data['answer4_belanja_pegawai_upah'] = $this->number_format($answers4->belanja_pegawai_upah);
        $data['answer4_belanja_modal_properti'] = $this->number_format($answers4->belanja_modal_properti);
        $data['answer4_belanja_modal_mesin'] = $this->number_format($answers4->belanja_modal_mesin);
        $data['answer4_belanja_operasional_maintenance'] = $this->number_format($answers4->belanja_operasional_maintenance);
    }

    private function getAnswers5(Answers $answers, &$data){
        $list_answers5 = $answers->Answers5;

        $data['answer5_code'] = [];
        $data['answer5_percentage'] = [];

        /** @var Answers5 $answers5 */
        foreach($list_answers5 as $index=>$answers5){
            $data['answer5_code'][$index+1] = $answers5->code;
            $data['answer5_percentage'][$index+1] = $answers5->percentage;
        }
    }

    private function getAnswers6(Answers $answers, &$data){
        $list_answers6 = $answers->Answers6;

        $data['answer6_code'] = [];
        $data['answer6_percentage'] = [];

        /** @var Answers6 $answers6 */
        foreach($list_answers6 as $index=>$answers6){
            $data['answer6_code'][$index+1] = $answers6->code;
            $data['answer6_percentage'][$index+1] = $answers6->percentage;
        }
    }

    private function getAnswers7(Answers $answers, &$data){
        /** @var Answers7 $answers7 */
        $answers7 = $answers->Answers7;

        $data['answer7_penelitian_dasar'] = $this->number_format($answers7->penelitian_dasar);
        $data['answer7_penelitian_terapan'] = $this->number_format($answers7->penelitian_terapan);
        $data['answer7_pengembangan_eksperimental'] = $this->number_format($answers7->pengembangan_eksperimental);
    }

    private function getAnswers8(Answers $answers, &$data){
        $list_answers8 = $answers->Answers8;

        $is_empty = empty($list_answers8) || count($list_answers8) === 0 ? true : false;

        $data['answer8_institusi'] = [];
        $data['answer8_jumlah_dana'] = [];

        if($is_empty){
            return $data;
        }

        $data['question8_switch'] = 'on';

        /** @var Answers8 $answers8 */
        foreach($list_answers8 as $index=>$answers8){
            $data['answer8_institusi'][$index+1] = $answers8->institusi;
            $data['answer8_jumlah_dana'][$index+1] = $this->number_format($answers8->jumlah_dana);
        }
    }

    private function getAnswers9a(Answers $answers, &$data){
        /** @var Answers9a $answers9a */
        $answers9a = $answers->Answers9a;

        $data['answer9a_total_pegawai'] = $answers9a->total_pegawai;
    }

    private function getAnswers9b(Answers $answers, &$data){
        /** @var Answers9b $answers9b */
        $answers9b = $answers->Answers9b;

        $data['answer9b_total_peneliti_fungsional_s3_l'] = $answers9b->peneliti_fungsional_peneliti_s3_l;
        $data['answer9b_total_peneliti_fungsional_s3_p'] = $answers9b->peneliti_fungsional_peneliti_s3_p;
        $data['answer9b_total_peneliti_fungsional_s3_fte_l'] = $answers9b->peneliti_fungsional_peneliti_s3_fte_l;
        $data['answer9b_total_peneliti_fungsional_s3_fte_p'] = $answers9b->peneliti_fungsional_peneliti_s3_fte_p;
        $data['answer9b_total_peneliti_fungsional_s2_l'] = $answers9b->peneliti_fungsional_peneliti_s2_l;
        $data['answer9b_total_peneliti_fungsional_s2_p'] = $answers9b->peneliti_fungsional_peneliti_s2_p;
        $data['answer9b_total_peneliti_fungsional_s2_fte_l'] = $answers9b->peneliti_fungsional_peneliti_s2_fte_l;
        $data['answer9b_total_peneliti_fungsional_s2_fte_p'] = $answers9b->peneliti_fungsional_peneliti_s2_fte_p;
        $data['answer9b_total_peneliti_fungsional_s1_l'] = $answers9b->peneliti_fungsional_peneliti_s1_l;
        $data['answer9b_total_peneliti_fungsional_s1_p'] = $answers9b->peneliti_fungsional_peneliti_s1_p;
        $data['answer9b_total_peneliti_fungsional_s1_fte_l'] = $answers9b->peneliti_fungsional_peneliti_s1_fte_l;
        $data['answer9b_total_peneliti_fungsional_s1_fte_p'] = $answers9b->peneliti_fungsional_peneliti_s1_fte_p;
        $data['answer9b_total_nonpeneliti_fungsional_s3_l'] = $answers9b->peneliti_fungsional_nonpeneliti_s3_l;
        $data['answer9b_total_nonpeneliti_fungsional_s3_p'] = $answers9b->peneliti_fungsional_nonpeneliti_s3_p;
        $data['answer9b_total_nonpeneliti_fungsional_s3_fte_l'] = $answers9b->peneliti_fungsional_nonpeneliti_s3_fte_l;
        $data['answer9b_total_nonpeneliti_fungsional_s3_fte_p'] = $answers9b->peneliti_fungsional_nonpeneliti_s3_fte_p;
        $data['answer9b_total_nonpeneliti_fungsional_s2_l'] = $answers9b->peneliti_fungsional_nonpeneliti_s2_l;
        $data['answer9b_total_nonpeneliti_fungsional_s2_p'] = $answers9b->peneliti_fungsional_nonpeneliti_s2_p;
        $data['answer9b_total_nonpeneliti_fungsional_s2_fte_l'] = $answers9b->peneliti_fungsional_nonpeneliti_s2_fte_l;
        $data['answer9b_total_nonpeneliti_fungsional_s2_fte_p'] = $answers9b->peneliti_fungsional_nonpeneliti_s2_fte_p;
        $data['answer9b_total_nonpeneliti_fungsional_s1_l'] = $answers9b->peneliti_fungsional_nonpeneliti_s1_l;
        $data['answer9b_total_nonpeneliti_fungsional_s1_p'] = $answers9b->peneliti_fungsional_nonpeneliti_s1_p;
        $data['answer9b_total_nonpeneliti_fungsional_s1_fte_l'] = $answers9b->peneliti_fungsional_nonpeneliti_s1_fte_l;
        $data['answer9b_total_nonpeneliti_fungsional_s1_fte_p'] = $answers9b->peneliti_fungsional_nonpeneliti_s1_fte_p;
        $data['answer9b_total_peneliti_nonfungsional_s3_l'] = $answers9b->peneliti_nonfungsional_s3_l;
        $data['answer9b_total_peneliti_nonfungsional_s3_p'] = $answers9b->peneliti_nonfungsional_s3_p;
        $data['answer9b_total_peneliti_nonfungsional_s3_fte_l'] = $answers9b->peneliti_nonfungsional_s3_fte_l;
        $data['answer9b_total_peneliti_nonfungsional_s3_fte_p'] = $answers9b->peneliti_nonfungsional_s3_fte_p;
        $data['answer9b_total_peneliti_nonfungsional_s2_l'] = $answers9b->peneliti_nonfungsional_s2_l;
        $data['answer9b_total_peneliti_nonfungsional_s2_p'] = $answers9b->peneliti_nonfungsional_s2_p;
        $data['answer9b_total_peneliti_nonfungsional_s2_fte_l'] = $answers9b->peneliti_nonfungsional_s2_fte_l;
        $data['answer9b_total_peneliti_nonfungsional_s2_fte_p'] = $answers9b->peneliti_nonfungsional_s2_fte_p;
        $data['answer9b_total_peneliti_nonfungsional_s1_l'] = $answers9b->peneliti_nonfungsional_s1_l;
        $data['answer9b_total_peneliti_nonfungsional_s1_p'] = $answers9b->peneliti_nonfungsional_s1_p;
        $data['answer9b_total_peneliti_nonfungsional_s1_fte_l'] = $answers9b->peneliti_nonfungsional_s1_fte_l;
        $data['answer9b_total_peneliti_nonfungsional_s1_fte_p'] = $answers9b->peneliti_nonfungsional_s1_fte_p;
        $data['answer9b_total_teknisi_s1_l'] = $answers9b->teknisi_s1_l;
        $data['answer9b_total_teknisi_s1_p'] = $answers9b->teknisi_s1_p;
        $data['answer9b_total_teknisi_s1_fte_l'] = $answers9b->teknisi_s1_fte_l;
        $data['answer9b_total_teknisi_s1_fte_p'] = $answers9b->teknisi_s1_fte_p;
        $data['answer9b_total_teknisi_d3_l'] = $answers9b->teknisi_d3_l;
        $data['answer9b_total_teknisi_d3_p'] = $answers9b->teknisi_d3_p;
        $data['answer9b_total_teknisi_d3_fte_l'] = $answers9b->teknisi_d3_fte_l;
        $data['answer9b_total_teknisi_d3_fte_p'] = $answers9b->teknisi_d3_fte_p;
        $data['answer9b_total_teknisi_belowd3_l'] = $answers9b->teknisi_belowd3_l;
        $data['answer9b_total_teknisi_belowd3_p'] = $answers9b->teknisi_belowd3_p;
        $data['answer9b_total_teknisi_belowd3_fte_l'] = $answers9b->teknisi_belowd3_fte_l;
        $data['answer9b_total_teknisi_belowd3_fte_p'] = $answers9b->teknisi_belowd3_fte_p;
        $data['answer9b_total_staffpendukung_s1_l'] = $answers9b->staffpendukung_s1_l;
        $data['answer9b_total_staffpendukung_s1_p'] = $answers9b->staffpendukung_s1_p;
        $data['answer9b_total_staffpendukung_s1_fte_l'] = $answers9b->staffpendukung_s1_fte_l;
        $data['answer9b_total_staffpendukung_s1_fte_p'] = $answers9b->staffpendukung_s1_fte_p;
        $data['answer9b_total_staffpendukung_d3_l'] = $answers9b->staffpendukung_d3_l;
        $data['answer9b_total_staffpendukung_d3_p'] = $answers9b->staffpendukung_d3_p;
        $data['answer9b_total_staffpendukung_d3_fte_l'] = $answers9b->staffpendukung_d3_fte_l;
        $data['answer9b_total_staffpendukung_d3_fte_p'] = $answers9b->staffpendukung_d3_fte_p;
        $data['answer9b_total_staffpendukung_belowd3_l'] = $answers9b->staffpendukung_belowd3_l;
        $data['answer9b_total_staffpendukung_belowd3_p'] = $answers9b->staffpendukung_belowd3_p;
        $data['answer9b_total_staffpendukung_belowd3_fte_l'] = $answers9b->staffpendukung_belowd3_fte_l;
        $data['answer9b_total_staffpendukung_belowd3_fte_p'] = $answers9b->staffpendukung_belowd3_fte_p;
    }
}