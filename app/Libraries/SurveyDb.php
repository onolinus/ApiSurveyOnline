<?php

namespace app\Libraries;

use App\Answers18;
use App\Correspondents;
use App\TraitSessionToken;
use Illuminate\Database\Eloquent\Collection;
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

    /**
     * @var Correspondents $correspondent
     * @var Answers $answers
     *
     */
    private $correspondent, $answers;

    private function preCheck($user_id){
        $this->correspondent = Correspondents::find($user_id);

        if($this->correspondent === null){
            return false;
        }

        if($this->correspondent->Answers === null){
            return false;
        }

        $this->answers = $this->correspondent->Answers;

        return true;
    }

    private function getStatusValue($status){
        return in_array($status, [Answers::STATUS_ANSWERS_SENT, Answers::STATUS_ANSWERS_VALIDATION_PROGRESS, Answers::STATUS_ANSWERS_VALIDATION_APPROVED]) ? 1 : 0;
    }

    private function getAnswers1Status(Answers $answers){
        /** @var Answers1 $answers1 */
        $answers1 = $answers->Answers1;
        return $this->getStatusValue($answers1->status);
    }

    private function getAnswers1Comment(Answers $answers){
        /** @var Answers1 $answers1 */
        $answers1 = $answers->Answers1;
        return $answers1->status_comment;
    }

    private function getAnswers2Status(Answers $answers){
        /** @var Answers2 $answers2 */
        $answers2 = $answers->Answers2;
        return $this->getStatusValue($answers2->status);
    }

    private function getAnswers2Comment(Answers $answers){
        /** @var Answers2 $answers2 */
        $answers2 = $answers->Answers2;
        return $answers2->status_comment;
    }

    private function getAnswers3Status(Answers $answers){
        /** @var Answers3 $answers3 */
        $answers3 = $answers->Answers3;
        return $this->getStatusValue($answers3->status);
    }

    private function getAnswers3Comment(Answers $answers){
        /** @var Answers3 $answers3 */
        $answers3 = $answers->Answers3;
        return $answers3->status_comment;
    }

    private function getAnswers4Status(Answers $answers){
        /** @var Answers4 $answers4 */
        $answers4 = $answers->Answers4;
        return $this->getStatusValue($answers4->status);
    }

    private function getAnswers4Comment(Answers $answers){
        /** @var Answers4 $answers4 */
        $answers4 = $answers->Answers4;
        return $answers4->status_comment;
    }

    private function getAnswers5Status(Answers $answers){
        /** @var Collection $list_answers5 */
        $list_answers5 = $answers->Answers5;

        $answers5_status = 1;

        /** @var Answers5 $answers5 */
        $answers5 = $list_answers5->first();
        $answers5_status = $answers5 === null ? 1 : $this->getStatusValue($answers5->status);
        return $answers5_status;
    }

    private function getAnswers5Comment(Answers $answers){
        /** @var Collection $list_answers5 */
        $list_answers5 = $answers->Answers5;

        /** @var Answers5 $answers5 */
        $answers5 = $list_answers5->first();
        return $answers5 === null ? '' : $answers5->status_comment;
    }

    private function getAnswers6Status(Answers $answers){
        /** @var Collection $list_answers6 */
        $list_answers6 = $answers->Answers6;

        /** @var Answers6 $answers6 */
        $answers6 = $list_answers6->first();
        $answers6_status = $answers6 === null ? 1 : $this->getStatusValue($answers6->status);
        return $answers6_status;
    }

    private function getAnswers6Comment(Answers $answers){
        /** @var Collection $list_answers6 */
        $list_answers6 = $answers->Answers6;

        /** @var Answers6 $answers6 */
        $answers6 = $list_answers6->first();
        return $answers6 === null ? '' : $answers6->status_comment;
    }

    private function getAnswers7Status(Answers $answers){
        /** @var Answers7 $answers7 */
        $answers7 = $answers->Answers7;
        return $this->getStatusValue($answers7->status);
    }

    private function getAnswers7Comment(Answers $answers){
        /** @var Answers7 $answers7 */
        $answers7 = $answers->Answers7;
        return $answers7->status_comment;
    }

    private function getAnswers8Status(Answers $answers){
        /** @var Collection $list_answers8 */
        $list_answers8 = $answers->Answers8;

        /** @var Answers8 $answers8 */
        $answers8 = $list_answers8->first();
        $answers8_status = $answers8 === null ? 1 : $this->getStatusValue($answers8->status);

        return $answers8_status;
    }

    private function getAnswers8Comment(Answers $answers){
        /** @var Collection $list_answers8 */
        $list_answers8 = $answers->Answers8;

        /** @var Answers8 $answers8 */
        $answers8 = $list_answers8->first();
        return $answers8 === null ? '' : $answers8->status_comment;
    }

    private function getAnswers9Status(Answers $answers){
        /** @var Answers9a $answers9a */
        $answers9a = $answers->Answers9a;
        $answers9aStatus = $this->getStatusValue($answers9a->status);

        /** @var Answers9b $answers9b */
        $answers9b = $answers->Answers9b;
        $answers9bStatus = $this->getStatusValue($answers9b->status);

        /** @var Collection $list_answers9c */
        $list_answers9c = $answers->Answers9c;
        /** @var Answers9c $answers9c */
        $answers9c = $list_answers9c->first();
        $answers9cStatus = $answers9c === null ? 1 : $this->getStatusValue($answers9c->status);

        return $answers9aStatus === 1 && $answers9bStatus === 1 && $answers9cStatus === 1 ? 1 : 0;
    }

    private function getAnswers9aComment(Answers $answers){
        /** @var Answers9a $answers9a */
        $answers9a = $answers->Answers9a;
        return  $answers9a->status_comment;
    }

    private function getAnswers9bComment(Answers $answers)
    {
        /** @var Answers9b $answers9b */
        $answers9b = $answers->Answers9b;
        return $answers9b->status_comment;
    }

    private function getAnswers9cComment(Answers $answers)
    {
        /** @var Collection $list_answers9c */
        $list_answers9c = $answers->Answers9c;

        /** @var Answers9c $answers9c */
        $answers9c = $list_answers9c->first();
        return $answers9c === null ? '' : $answers9c->status_comment;
    }

    private function getAnswers10Status(Answers $answers){
        /** @var Answers10 $answers10 */
        $answers10 = $answers->Answers10;
        return $answers10 === null ? 1 : $this->getStatusValue($answers10->status);
    }

    private function getAnswers10Comment(Answers $answers){
        /** @var Answers10 $answers10 */
        $answers10 = $answers->Answers10;
        return $answers10 === null ? '' : $answers10->status_comment;
    }

    private function getAnswers11Status(Answers $answers){
        /** @var Collection $list_answers11 */
        $list_answers11 = $answers->Answers11;
        /** @var Answers11 $answers11 */
        $answers11 = $list_answers11->first();
        $answers11Status = $answers11 === null ? 1 : $this->getStatusValue($answers11->status);

        return $answers11Status;
    }

    private function getAnswers11Comment(Answers $answers){
        /** @var Collection $list_answers11 */
        $list_answers11 = $answers->Answers11;
        /** @var Answers11 $answers11 */
        $answers11 = $list_answers11->first();

        return $answers11 === null ? '' : $answers11->status_comment;
    }

    private function getAnswers12Status(Answers $answers){
        /** @var Collection $list_answers12 */
        $list_answers12 = $answers->Answers12;
        /** @var Answers12 $answers12 */
        $answers12 = $list_answers12->first();
        $answers12Status = $answers12 === null ? 1 : $this->getStatusValue($answers12->status);

        return $answers12Status;
    }

    private function getAnswers12Comment(Answers $answers){
        /** @var Collection $list_answers12 */
        $list_answers12 = $answers->Answers12;
        /** @var Answers12 $answers12 */
        $answers12 = $list_answers12->first();

        return $answers12 === null ? '' : $answers12->status_comment;
    }

    private function getAnswers13Status(Answers $answers){
        /** @var Collection $list_answers13 */
        $list_answers13 = $answers->Answers13;
        /** @var Answers13 $answers13 */
        $answers13 = $list_answers13->first();
        $answers13Status = $answers13 === null ? 1 : $this->getStatusValue($answers13->status);

        return $answers13Status;
    }

    private function getAnswers13Comment(Answers $answers){
        /** @var Collection $list_answers13 */
        $list_answers13 = $answers->Answers13;
        /** @var Answers13 $answers13 */
        $answers13 = $list_answers13->first();
        return $answers13 === null ? '' : $answers13->status_comment;
    }

    private function getAnswers14Status(Answers $answers){
        /** @var Collection $list_answers14 */
        $list_answers14 = $answers->Answers14;
        /** @var Answers14 $answers14 */
        $answers14 = $list_answers14->first();
        $answers14Status = $answers14 === null ? 1 : $this->getStatusValue($answers14->status);

        return $answers14Status;
    }

    private function getAnswers14Comment(Answers $answers){
        /** @var Collection $list_answers14 */
        $list_answers14 = $answers->Answers14;
        /** @var Answers14 $answers14 */
        $answers14 = $list_answers14->first();

        return $answers14 === null ? '' : $answers14->status_comment;
    }

    private function getAnswers15Status(Answers $answers){
        /** @var Collection $list_answers15a */
        $list_answers15a = $answers->Answers15a;
        /** @var Answers15a $answers15a */
        $answers15a = $list_answers15a->first();
        $answers15aStatus = $answers15a === null ? 1 : $this->getStatusValue($answers15a->status);

        /** @var Collection $list_answers15b */
        $list_answers15b = $answers->Answers15b;
        /** @var Answers15b $answers15b */
        $answers15b = $list_answers15b->first();
        $answers15bStatus = $answers15b === null ? 1 : $this->getStatusValue($answers15b->status);

        return $answers15aStatus === 1 && $answers15bStatus === 1 ? 1 : 0;
    }

    private function getAnswers15aComment(Answers $answers){
        /** @var Collection $list_answers15a */
        $list_answers15a = $answers->Answers15a;
        /** @var Answers15a $answers15a */
        $answers15a = $list_answers15a->first();
        return $answers15a === null ? '' : $answers15a->status_comment;
    }

    private function getAnswers15bComment(Answers $answers){
        /** @var Collection $list_answers15b */
        $list_answers15b = $answers->Answers15b;
        /** @var Answers15b $answers15b */
        $answers15b = $list_answers15b->first();
        return $answers15b === null ? '' : $answers15b->status_comment;
    }

    private function getAnswers16Status(Answers $answers){
        /** @var Collection $list_answers16a */
        $list_answers16a = $answers->Answers16a;
        /** @var Answers16a $answers16a */
        $answers16a = $list_answers16a->first();
        $answers16aStatus = $answers16a === null ? 1 : $this->getStatusValue($answers16a->status);

        /** @var Answers16b $answers16b */
        $answers16b = $answers->Answers16b;
        $answers16bStatus = $answers16b === null ? 1 : $this->getStatusValue($answers16b->status);

        return $answers16aStatus === 1 && $answers16bStatus === 1 ? 1 : 0;
    }

    private function getAnswers16aComment(Answers $answers){
        /** @var Collection $list_answers16a */
        $list_answers16a = $answers->Answers16a;
        /** @var Answers16a $answers16a */
        $answers16a = $list_answers16a->first();
        return $answers16a === null ? '' : $answers16a->status_comment;
    }

    private function getAnswers16bComment(Answers $answers){
        /** @var Answers16b $answers16b */
        $answers16b = $answers->Answers16b;
        return $answers16b === null ? '' :  $answers16b->status_comment;
    }

    private function getAnswers17Status(Answers $answers){
        /** @var Collection $list_answers17 */
        $list_answers17 = $answers->Answers17;
        /** @var Answers17 $answers17 */
        $answers17 = $list_answers17->first();
        $answers17Status = $answers17 === null ? 1 : $this->getStatusValue($answers17->status);

        return $answers17Status;
    }

    private function getAnswers17Comment(Answers $answers){
        /** @var Collection $list_answers17 */
        $list_answers17 = $answers->Answers17;
        /** @var Answers17 $answers17 */
        $answers17 = $list_answers17->first();

        return $answers17 === null ? '' : $answers17->status_comment;
    }

    private function getAnswers18Status(Answers $answers){
        /** @var Answers18 $answers18 */
        $answers18 = $answers->Answers18;
        return $this->getStatusValue($answers18->status);
    }

    private function getAnswers18Comment(Answers $answers){
        /** @var Answers18 $answers18 */
        $answers18 = $answers->Answers18;
        return $answers18->status_comment;
    }

    public function getListAnswersStatus($user_id){
        if($this->preCheck($user_id) === false){
            return null;
        }

        return [
            'lock_status' => intval($this->getLockStatus($this->answers)),
            'status' => $this->answers->status,
            'data' => [
                '1' => $this->getAnswers1Status($this->answers),
                '2' => $this->getAnswers2Status($this->answers),
                '3' => $this->getAnswers3Status($this->answers),
                '4' => $this->getAnswers4Status($this->answers),
                '5' => $this->getAnswers5Status($this->answers),
                '6' => $this->getAnswers6Status($this->answers),
                '7' => $this->getAnswers7Status($this->answers),
                '8' => $this->getAnswers8Status($this->answers),
                '9' => $this->getAnswers9Status($this->answers),
                '10' => $this->getAnswers10Status($this->answers),
                '11' => $this->getAnswers11Status($this->answers),
                '12' => $this->getAnswers12Status($this->answers),
                '13' => $this->getAnswers13Status($this->answers),
                '14' => $this->getAnswers14Status($this->answers),
                '15' => $this->getAnswers15Status($this->answers),
                '16' => $this->getAnswers16Status($this->answers),
                '17' => $this->getAnswers17Status($this->answers),
                '18' => $this->getAnswers18Status($this->answers),
            ]
        ];
    }

    public function getListComment($user_id){
        if($this->preCheck($user_id) === false){
            return null;
        }

        return [
            '1' => $this->getAnswers1Comment($this->answers),
            '2' => $this->getAnswers2Comment($this->answers),
            '3' => $this->getAnswers3Comment($this->answers),
            '4' => $this->getAnswers4Comment($this->answers),
            '5' => $this->getAnswers5Comment($this->answers),
            '6' => $this->getAnswers6Comment($this->answers),
            '7' => $this->getAnswers7Comment($this->answers),
            '8' => $this->getAnswers8Comment($this->answers),
            '9a' => $this->getAnswers9aComment($this->answers),
            '9b' => $this->getAnswers9bComment($this->answers),
            '9c' => $this->getAnswers9cComment($this->answers),
            '10' => $this->getAnswers10Comment($this->answers),
            '11' => $this->getAnswers11Comment($this->answers),
            '12' => $this->getAnswers12Comment($this->answers),
            '13' => $this->getAnswers13Comment($this->answers),
            '14' => $this->getAnswers14Comment($this->answers),
            '15a' => $this->getAnswers15aComment($this->answers),
            '15b' => $this->getAnswers15bComment($this->answers),
            '16a' => $this->getAnswers16aComment($this->answers),
            '16b' => $this->getAnswers16bComment($this->answers),
            '17' => $this->getAnswers17Comment($this->answers),
            '18' => $this->getAnswers18Comment($this->answers),
        ];
    }

    private function getLockStatus(Answers $answers){
        if($answers->status === Answers::STATUS_ANSWERS_VALIDATION_REJECTED){
            return false;
        }

        return true;
    }

    public function getListAnswers($user_id){
        if($this->preCheck($user_id) === false){
            return null;
        }

        $answers = $this->answers;
        $data = [];

        if ($answers) {
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
            $this->getAnswers9c($answers, $data);
            $this->getAnswers10($answers, $data);
            $this->getAnswers11($answers, $data);
            $this->getAnswers12($answers, $data);
            $this->getAnswers13($answers, $data);
            $this->getAnswers14($answers, $data);
            $this->getAnswers15($answers, $data);
            $this->getAnswers16($answers, $data);
            $this->getAnswers17($answers, $data);
            $this->getAnswers18($answers, $data);
        }

        return $data;
    }

    private function number_format($number){
        return number_format(floatval($number), 2, ',', '.');
    }

    private function getAnswers1(Answers $answers, &$data){
        /** @var Answers1 $answers1 */
        $answers1 = $answers->Answers1;

        $data['answer1_total'] = $this->number_format($answers1->total);
        $data['answer1_percentage'] = $answers1->percentage;
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

    private function getAnswers9c(Answers $answers, &$data){
        $list_answers9c = $answers->Answers9c;

        $data['answer9c_klasifikasi'] = [];
        $data['answer9c_s1_l'] = [];
        $data['answer9c_s1_p'] = [];
        $data['answer9c_s2_l'] = [];
        $data['answer9c_s2_p'] = [];
        $data['answer9c_s3_l'] = [];
        $data['answer9c_s3_p'] = [];

        /** @var Answers9c $answers9c */
        foreach($list_answers9c as $index=>$answers9c){
            $data['answer9c_klasifikasi'][$index+1] = $answers9c->code;
            $data['answer9c_s1_l'][$index+1] = $answers9c->s1_l;
            $data['answer9c_s1_p'][$index+1] = $answers9c->s1_p;
            $data['answer9c_s2_l'][$index+1] = $answers9c->s2_l;
            $data['answer9c_s2_p'][$index+1] = $answers9c->s2_p;
            $data['answer9c_s3_l'][$index+1] = $answers9c->s3_l;
            $data['answer9c_s3_p'][$index+1] = $answers9c->s3_p;
        }
    }

    private function getAnswers10(Answers $answers, &$data){
        $answers10 = $answers->Answers10;

        if($answers10 === null){
            return false;
        }

        $data['question10_switch'] = 'on';
        $data['answer10_jumlah_peneliti_pemerintah'] = $answers10->jumlah_peneliti_pemerintah;
        $data['answer10_jumlah_peneliti_perguruantinggi'] = $answers10->jumlah_peneliti_perguruantinggi;
        $data['answer10_jumlah_peneliti_industri'] = $answers10->jumlah_peneliti_industri;
        $data['answer10_jumlah_peneliti_lembagaswadaya'] = $answers10->jumlah_peneliti_lembagaswadaya;
        $data['answer10_jumlah_peneliti_asing'] = $answers10->jumlah_peneliti_asing;
    }

    private function getAnswers11(Answers $answers, &$data){
        $list_answers11 = $answers->Answers11;

        $is_empty = empty($list_answers11) || count($list_answers11) === 0 ? true : false;

        $data['answer11_nama_jurnal'] = [];
        $data['answer11_code'] = [];
        $data['answer11_jumlah'] = [];

        if($is_empty){
            return $data;
        }

        $data['question11_switch'] = 'on';

        /** @var Answers11 $answers11 */
        foreach($list_answers11 as $index=>$answers11){
            $data['answer11_nama_jurnal'][$index+1] = $answers11->nama_jurnal;
            $data['answer11_code'][$index+1] = $answers11->code;
            $data['answer11_jumlah'][$index+1] = $answers11->jumlah;
        }
    }

    private function getAnswers12(Answers $answers, &$data){
        $list_answers12 = $answers->Answers12;

        $is_empty = empty($list_answers12) || count($list_answers12) === 0 ? true : false;

        $data['answer12_nama_jurnal'] = [];
        $data['answer12_code'] = [];
        $data['answer12_jumlah'] = [];

        if($is_empty){
            return $data;
        }

        $data['question12_switch'] = 'on';

        /** @var Answers12 $answers12 */
        foreach($list_answers12 as $index=>$answers12){
            $data['answer12_nama_jurnal'][$index+1] = $answers12->nama_jurnal;
            $data['answer12_code'][$index+1] = $answers12->code;
            $data['answer12_jumlah'][$index+1] = $answers12->jumlah;
        }
    }

    private function getAnswers13(Answers $answers, &$data){
        $list_answers13 = $answers->Answers13;

        $is_empty = empty($list_answers13) || count($list_answers13) === 0 ? true : false;

        $data['answer13_nama_peneliti'] = [];
        $data['answer13_nama_seminar'] = [];
        $data['answer13_negara_penyelenggara_seminar'] = [];

        if($is_empty){
            return $data;
        }

        $data['question13_switch'] = 'on';

        /** @var Answers13 $answers13 */
        foreach($list_answers13 as $index=>$answers13){
            $data['answer13_nama_peneliti'][$index+1] = $answers13->nama_peneliti;
            $data['answer13_nama_seminar'][$index+1] = $answers13->nama_seminar;
            $data['answer13_negara_penyelenggara_seminar'][$index+1] = $answers13->negara_penyelenggara_seminar;
        }
    }

    private function getAnswers14(Answers $answers, &$data){
        $list_answers14 = $answers->Answers14;

        $is_empty = empty($list_answers14) || count($list_answers14) === 0 ? true : false;

        $data['answer14_nama_penerima_award'] = [];
        $data['answer14_nama_award'] = [];
        $data['answer14_institusi_pemberi_award'] = [];

        if($is_empty){
            return $data;
        }

        $data['question14_switch'] = 'on';

        /** @var Answers14 $answers14 */
        foreach($list_answers14 as $index=>$answers14){
            $data['answer14_nama_penerima_award'][$index+1] = $answers14->nama_penerima_award;
            $data['answer14_nama_award'][$index+1] = $answers14->nama_award;
            $data['answer14_institusi_pemberi_award'][$index+1] = $answers14->institusi_pemberi_award;
        }
    }

    private function getAnswers15(Answers $answers, &$data){
        $list_answers15a = $answers->Answers15a;
        $list_answers15b = $answers->Answers15b;

        $is_empty = empty($list_answers15a) || count($list_answers15a) === 0 ? true : false;

        $data['answer15a_nama_barang'] = [];
        $data['answer15a_terkomersialisasi'] = [];
        $data['answer15a_tahun'] = [];

        $data['answer15b_nama_jasa'] = [];
        $data['answer15b_pengguna_jasa'] = [];
        $data['answer15b_tahun'] = [];

        if($is_empty){
            return $data;
        }

        $data['question15_switch'] = 'on';

        /** @var Answers15a $answers15a */
        foreach($list_answers15a as $index=>$answers15a){
            $data['answer15a_nama_barang'][$index+1] = $answers15a->nama_barang;
            $data['answer15a_terkomersialisasi'][$index+1] = $answers15a->terkomersialisasi;
            $data['answer15a_tahun'][$index+1] = $answers15a->tahun;
        }

        /** @var Answers15b $answers15b */
        foreach($list_answers15b as $index=>$answers15b){
            $data['answer15b_nama_jasa'][$index+1] = $answers15b->nama_jasa;
            $data['answer15b_pengguna_jasa'][$index+1] = $answers15b->pengguna_jasa;
            $data['answer15b_tahun'][$index+1] = $answers15b->tahun;
        }
    }

    private function getAnswers16(Answers $answers, &$data){
        $list_answers16a = $answers->Answers16a;
        $answers16b = $answers->Answers16b;

        $is_empty = empty($list_answers16a) || count($list_answers16a) === 0 ? true : false;

        $data['answer16a_tahun'] = [];
        $data['answer16a_usulan_paten'] = [];
        $data['answer16a_usulan_patensederhana'] = [];
        $data['answer16a_disetujui_paten'] = [];
        $data['answer16a_disetujui_patensederhana'] = [];
        $data['answer16a_terkomersialisasi_paten'] = [];
        $data['answer16a_terkomersialisasi_patensederhana'] = [];

        if($is_empty){
            return $data;
        }

        $data['question16_switch'] = 'on';

        /** @var Answers16a $answers16a */
        foreach($list_answers16a as $index=>$answers16a){
            $data['answer16a_tahun'][$index+1] = $answers16a->tahun;
            $data['answer16a_usulan_paten'][$index+1] = $answers16a->usulan_paten;
            $data['answer16a_usulan_patensederhana'][$index+1] = $answers16a->usulan_patensederhana;
            $data['answer16a_disetujui_paten'][$index+1] = $answers16a->disetujui_paten;
            $data['answer16a_disetujui_patensederhana'][$index+1] = $answers16a->disetujui_patensederhana;
            $data['answer16a_terkomersialisasi_paten'][$index+1] = $answers16a->terkomersialisasi_paten;
            $data['answer16a_terkomersialisasi_patensederhana'][$index+1] = $answers16a->terkomersialisasi_patensederhana;
        }

        /** @var Answers16b $answers16b */
        $data['answer16b_jumlah_patenluarnegeri'] = $answers16b->jumlah_patenluarnegeri;
    }

    private function getAnswers17(Answers $answers, &$data){
        $list_answers17 = $answers->Answers17;

        $is_empty = empty($list_answers17) || count($list_answers17) === 0 ? true : false;

        $data['answer17_lisensi'] = [];
        $data['answer17_tahun'] = [];
        $data['answer17_nilai'] = [];

        if($is_empty){
            return $data;
        }

        $data['question17_switch'] = 'on';

        /** @var Answers17 $answers17 */
        foreach($list_answers17 as $index=>$answers17){
            $data['answer17_lisensi'][$index+1] = $answers17->lisensi;
            $data['answer17_tahun'][$index+1] = $answers17->tahun;
            $data['answer17_nilai'][$index+1] = $this->number_format($answers17->nilai);
        }
    }

    private function getAnswers18(Answers $answers, &$data){
        /** @var Answers18 $answers18 */
        $answers18 = $answers->Answers18;

        $data['answer18_comment'] = $answers18->comment;
    }
}