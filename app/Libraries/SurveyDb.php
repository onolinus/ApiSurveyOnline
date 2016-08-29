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

        if($correspondent === null){
            return null;
        }

        $answers = @$correspondent->Answers;
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