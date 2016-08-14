<?php

namespace app\Libraries;

use App\Answers18;
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

class Survey{

    private $questions = [], $errors = [];

    CONST COUNT_QUEST = 5;

    private $bail = false;

    /**
     * @var \Illuminate\Validation\Validator
     */
    protected $validator;

    use TraitSessionToken;

    public function __construct()
    {
        $this->setListOfQuestions();
    }

    private function setListOfQuestions(){
        for($number = 1; $number <= self::COUNT_QUEST; $number++){
            $questionClassName = "\\app\\Libraries\\Questions\\Question" . $number;

            /** @var InterfaceQuestion $questionClassName */
            $question = new $questionClassName();

            $this->setQuestion($question);
        }

        return $this;
    }

    public function setBail($bail){
        $this->bail = boolval($bail);
        return $this;
    }

    public function validate(Request $request){

        return true;

        $valid = true;

        /** @var InterfaceQuestion $question */
        foreach($this->questions as $number => $question){
            if(!$question->isValidAnswer()){
                $valid = false;

                $this->errors[$number] = $question->getErrors();

                if($this->bail === true){
                    return false;
                }
            }
        }

        return $valid;
    }

    public function isValid(){
        return empty($this->errors);
    }

    public function getErrors(){
        return $this->errors;
    }

    public function getQuestions(){
        return true;
    }

    public function getRules(){
        return true;
    }

    private function getValueFromNominalFormat($nominal){
        return $nominal;
    }

    public function save(Request $request){
        DB::transaction(function () use ($request) {
            $answers = $this->createNewAnswers($request);
            $this->createNewAnswers1($answers, $request);
            $this->createNewAnswers2($answers, $request);
            $this->createNewAnswers3($answers, $request);
            $this->createNewAnswers4($answers, $request);
            $this->createNewAnswers5($answers, $request);
            $this->createNewAnswers6($answers, $request);
            $this->createNewAnswers7($answers, $request);
            $this->createNewAnswers8($answers, $request);
            $this->createNewAnswers9a($answers, $request);
            $this->createNewAnswers9b($answers, $request);
            $this->createNewAnswers9c($answers, $request);
            $this->createNewAnswers10($answers, $request);
            $this->createNewAnswers11($answers, $request);
            $this->createNewAnswers12($answers, $request);
            $this->createNewAnswers13($answers, $request);
            $this->createNewAnswers14($answers, $request);
            $this->createNewAnswers15a($answers, $request);
            $this->createNewAnswers15b($answers, $request);
            $this->createNewAnswers16a($answers, $request);
            $this->createNewAnswers16b($answers, $request);
            $this->createNewAnswers17($answers, $request);
            $this->createNewAnswers18($answers, $request);
        });

        return true;
    }

    private function createNewAnswers(Request $request){
        $answers =  Answers::firstOrNew(['id_correspondent' => $this->getSessionUserID()]);
        $answers->status = 'pengisian';
        $answers->save();

        return $answers;
    }

    private function createNewAnswers1(Answers $answers, Request $request){
        $answers1 =  Answers1::firstOrNew(['id_answer' => $answers->id_answer]);
        $answers1->total = $this->getValueFromNominalFormat($request->input('data.answer1_total'));
        $answers1->percentage = $request->input('data.answer1_percentage');
        $answers1->save();
    }

    private function createNewAnswers2(Answers $answers, Request $request){
        $answers2 =  Answers2::firstOrNew(['id_answer' => $answers->id_answer]);
        $answers2->jumlah = $this->getValueFromNominalFormat($request->input('data.answer2_jumlah'));
        $answers2->save();
    }

    private function createNewAnswers3(Answers $answers, Request $request){
        $answers3 =  Answers3::firstOrNew(['id_answer' => $answers->id_answer]);
        $answers3->dipa_danapemerintah = $this->getValueFromNominalFormat($request->input('data.answer3_dipa_danapemerintah'));
        $answers3->dipa_pnbp_perusahaanswasta = $this->getValueFromNominalFormat($request->input('data.answer3_dipa_pnbp_perusahaanswasta'));
        $answers3->dipa_pnbp_instansipemerintah = $this->getValueFromNominalFormat($request->input('data.answer3_dipa_pnbp_instansipemerintah'));
        $answers3->dipa_pnbp_swastanonprofit = $this->getValueFromNominalFormat($request->input('data.answer3_dipa_pnbp_swastanonprofit '));
        $answers3->dipa_pnbp_luarnegeri = $this->getValueFromNominalFormat($request->input('data.answer3_dipa_pnbp_luarnegeri '));
        $answers3->dipa_phln = $this->getValueFromNominalFormat($request->input('data.answer3_dipa_phln '));
        $answers3->nondipa_insentif_ristekdikti = $this->getValueFromNominalFormat($request->input('data.answer3_nondipa_insentif_ristekdikti '));
        $answers3->nondipa_insentif_dalamnegeri = $this->getValueFromNominalFormat($request->input('data.answer3_nondipa_insentif_dalamnegeri '));
        $answers3->nondipa_insentif_researchgrant = $this->getValueFromNominalFormat($request->input('data.answer3_nondipa_insentif_researchgrant '));
        $answers3->save();
    }

    private function createNewAnswers4(Answers $answers, Request $request){
        $answers4 =  Answers4::firstOrNew(['id_answer' => $answers->id_answer]);
        $answers4->belanja_pegawai_upah = $this->getValueFromNominalFormat($request->input('data.answer4_belanja_pegawai_upah'));
        $answers4->belanja_modal_properti = $this->getValueFromNominalFormat($request->input('data.answer4_belanja_modal_properti'));
        $answers4->belanja_modal_mesin = $this->getValueFromNominalFormat($request->input('data.answer4_belanja_modal_mesin'));
        $answers4->belanja_operasional_maintenance = $this->getValueFromNominalFormat($request->input('data.answer4_belanja_operasional_maintenance '));
        $answers4->save();
    }

    private function createNewAnswers5(Answers $answers, Request $request){
        $deletedRows = Answers5::where('id_answer', $answers->id_answer)->delete();

        $codes = $request->input('data.answer5_code');
        $percentages = $request->input('data.answer5_percentage');

        foreach($codes as $row_index => $code){
            $answers5 = new Answers5;
            $answers5->code = $code;
            $answers5->percentage = $percentages[$row_index];
            $answers5->save();
        }
    }

    private function createNewAnswers6(Answers $answers, Request $request){
        $deletedRows = Answers6::where('id_answer', $answers->id_answer)->delete();

        $codes = $request->input('data.answer6_code');
        $percentages = $request->input('data.answer6_percentage');

        foreach($codes as $row_index => $code){
            $answers6 = new Answers6;
            $answers6->code = $code;
            $answers6->percentage = $percentages[$row_index];
            $answers6->save();
        }
    }

    private function createNewAnswers7(Answers $answers, Request $request){
        $answers7 =  Answers7::firstOrNew(['id_answer' => $answers->id_answer]);
        $answers7->penelitian_dasar = $this->getValueFromNominalFormat($request->input('data.answer7_penelitian_dasar'));
        $answers7->penelitian_terapan = $this->getValueFromNominalFormat($request->input('data.answer7_penelitian_terapan'));
        $answers7->pengembangan_eksperimental = $this->getValueFromNominalFormat($request->input('data.answer7_pengembangan_eksperimental'));
        $answers7->save();
    }

    private function createNewAnswers8(Answers $answers, Request $request){
        if($request->input('data.question8_switch') === 'on') {

            $deletedRows = Answers8::where('id_answer', $answers->id_answer)->delete();

            $arr_institusi = $request->input('data.answer8_institusi');
            $arr_jumlah_dana = $request->input('data.answer8_jumlah_dana');

            foreach ($arr_institusi as $row_index => $institusi) {
                $answers8 = new Answers8;
                $answers8->institusi = $arr_institusi[$row_index];
                $answers8->jumlah_dana = $this->getValueFromNominalFormat($arr_jumlah_dana[$row_index]);
                $answers8->save();
            }
        }
    }

    private function createNewAnswers9a(Answers $answers, Request $request){
        $answers9a =  Answers9a::firstOrNew(['id_answer' => $answers->id_answer]);
        $answers9a->total_pegawai = $request->input('data.answer9a_total_pegawai');
        $answers9a->save();
    }

    private function createNewAnswers9b(Answers $answers, Request $request){
        //1.1 Peneliti dengan jabatan fungsional Peneliti
        $answers9b =  Answers9b::firstOrNew(['id_answer' => $answers->id_answer]);
        $answers9b->peneliti_fungsional_peneliti_s1_l = $request->input('data.answer9b_total_peneliti_fungsional_s1_l');
        $answers9b->peneliti_fungsional_peneliti_s1_p = $request->input('data.answer9b_total_peneliti_fungsional_s1_p');
        $answers9b->peneliti_fungsional_peneliti_s1_fte_l = $request->input('data.answer9b_total_peneliti_fungsional_s1_fte_l');
        $answers9b->peneliti_fungsional_peneliti_s1_fte_p = $request->input('data.answer9b_total_peneliti_fungsional_s1_fte_p');

        $answers9b->peneliti_fungsional_peneliti_s2_l = $request->input('data.answer9b_total_peneliti_fungsional_s2_l');
        $answers9b->peneliti_fungsional_peneliti_s2_p = $request->input('data.answer9b_total_peneliti_fungsional_s2_p');
        $answers9b->peneliti_fungsional_peneliti_s2_fte_l = $request->input('data.answer9b_total_peneliti_fungsional_s2_fte_l');
        $answers9b->peneliti_fungsional_peneliti_s2_fte_p = $request->input('data.answer9b_total_peneliti_fungsional_s2_fte_p');

        $answers9b->peneliti_fungsional_peneliti_s3_l = $request->input('data.answer9b_total_peneliti_fungsional_s3_l');
        $answers9b->peneliti_fungsional_peneliti_s3_p = $request->input('data.answer9b_total_peneliti_fungsional_s3_p');
        $answers9b->peneliti_fungsional_peneliti_s3_fte_l = $request->input('data.answer9b_total_peneliti_fungsional_s3_fte_l');
        $answers9b->peneliti_fungsional_peneliti_s3_fte_p = $request->input('data.answer9b_total_peneliti_fungsional_s3_fte_p');

        //1.2 Peneliti dengan jabatan fungsional Non Peneliti
        $answers9b->peneliti_fungsional_nonpeneliti_s1_l = $request->input('data.answer9b_total_nonpeneliti_fungsional_s1_l');
        $answers9b->peneliti_fungsional_nonpeneliti_s1_p = $request->input('data.answer9b_total_nonpeneliti_fungsional_s1_p');
        $answers9b->peneliti_fungsional_nonpeneliti_s1_fte_l = $request->input('data.answer9b_total_nonpeneliti_fungsional_s1_fte_l');
        $answers9b->peneliti_fungsional_nonpeneliti_s1_fte_p = $request->input('data.answer9b_total_nonpeneliti_fungsional_s1_fte_p');

        $answers9b->peneliti_fungsional_nonpeneliti_s2_l = $request->input('data.answer9b_total_nonpeneliti_fungsional_s2_l');
        $answers9b->peneliti_fungsional_nonpeneliti_s2_p = $request->input('data.answer9b_total_nonpeneliti_fungsional_s2_p');
        $answers9b->peneliti_fungsional_nonpeneliti_s2_fte_l = $request->input('data.answer9b_total_nonpeneliti_fungsional_s2_fte_l');
        $answers9b->peneliti_fungsional_nonpeneliti_s2_fte_p = $request->input('data.answer9b_total_nonpeneliti_fungsional_s2_fte_p');

        $answers9b->peneliti_fungsional_nonpeneliti_s3_l = $request->input('data.answer9b_total_nonpeneliti_fungsional_s3_l');
        $answers9b->peneliti_fungsional_nonpeneliti_s3_p = $request->input('data.answer9b_total_nonpeneliti_fungsional_s3_p');
        $answers9b->peneliti_fungsional_nonpeneliti_s3_fte_l = $request->input('data.answer9b_total_nonpeneliti_fungsional_s3_fte_l');
        $answers9b->peneliti_fungsional_nonpeneliti_s3_fte_p = $request->input('data.answer9b_total_nonpeneliti_fungsional_s3_fte_p');

        //1.3 Peneliti tanpa jabatan fungsional
        $answers9b->peneliti_nonfungsional_s1_l = $request->input('data.answer9b_total_peneliti_nonfungsional_s1_l');
        $answers9b->peneliti_nonfungsional_s1_p = $request->input('data.answer9b_total_peneliti_nonfungsional_s1_p');
        $answers9b->peneliti_nonfungsional_s1_fte_l = $request->input('data.answer9b_total_peneliti_nonfungsional_s1_fte_l');
        $answers9b->peneliti_nonfungsional_s1_fte_p = $request->input('data.answer9b_total_peneliti_nonfungsional_s1_fte_p');

        $answers9b->peneliti_nonfungsional_s2_l = $request->input('data.answer9b_total_peneliti_nonfungsional_s2_l');
        $answers9b->peneliti_nonfungsional_s2_p = $request->input('data.answer9b_total_peneliti_nonfungsional_s2_p');
        $answers9b->peneliti_nonfungsional_s2_fte_l = $request->input('data.answer9b_total_peneliti_nonfungsional_s2_fte_l');
        $answers9b->peneliti_nonfungsional_s2_fte_p = $request->input('data.answer9b_total_peneliti_nonfungsional_s2_fte_p');

        $answers9b->peneliti_nonfungsional_s3_l = $request->input('data.answer9b_total_peneliti_nonfungsional_s3_l');
        $answers9b->peneliti_nonfungsional_s3_p = $request->input('data.answer9b_total_peneliti_nonfungsional_s3_p');
        $answers9b->peneliti_nonfungsional_s3_fte_l = $request->input('data.answer9b_total_peneliti_nonfungsional_s3_fte_l');
        $answers9b->peneliti_nonfungsional_s3_fte_p = $request->input('data.answer9b_total_peneliti_nonfungsional_s3_fte_p');

        // 2. Teknisi
        $answers9b->teknisi_s1_l = $request->input('data.answer9b_total_teknisi_s1_l');
        $answers9b->teknisi_s1_p = $request->input('data.answer9b_total_teknisi_s1_p');
        $answers9b->teknisi_s1_fte_l = $request->input('data.answer9b_total_teknisi_s1_fte_l');
        $answers9b->teknisi_s1_fte_p = $request->input('data.answer9b_total_teknisi_s1_fte_p');

        $answers9b->teknisi_d3_l = $request->input('data.answer9b_total_teknisi_d3_l');
        $answers9b->teknisi_d3_p = $request->input('data.answer9b_total_teknisi_d3_p');
        $answers9b->teknisi_d3_fte_l = $request->input('data.answer9b_total_teknisi_d3_fte_l');
        $answers9b->teknisi_d3_fte_p = $request->input('data.answer9b_total_teknisi_d3_fte_p');

        $answers9b->teknisi_belowd3_l = $request->input('data.answer9b_total_teknisi_belowd3_l');
        $answers9b->teknisi_belowd3_p = $request->input('data.answer9b_total_teknisi_belowd3_p');
        $answers9b->teknisi_belowd3_fte_l = $request->input('data.answer9b_total_teknisi_belowd3_fte_l');
        $answers9b->teknisi_belowd3_fte_p = $request->input('data.answer9b_total_teknisi_belowd3_fte_p');

        // 3. Staf Pendukung Litbang Lainnya (a+b+c)
        $answers9b->staffpendukung_s1_l = $request->input('data.answer9b_total_staffpendukung_s1_l');
        $answers9b->staffpendukung_s1_p = $request->input('data.answer9b_total_staffpendukung_s1_p');
        $answers9b->staffpendukung_s1_fte_l = $request->input('data.answer9b_total_staffpendukung_s1_fte_l');
        $answers9b->staffpendukung_s1_fte_p = $request->input('data.answer9b_total_staffpendukung_s1_fte_p');

        $answers9b->staffpendukung_d3_l = $request->input('data.answer9b_total_staffpendukung_d3_l');
        $answers9b->staffpendukung_d3_p = $request->input('data.answer9b_total_staffpendukung_d3_p');
        $answers9b->staffpendukung_d3_fte_l = $request->input('data.answer9b_total_staffpendukung_d3_fte_l');
        $answers9b->staffpendukung_d3_fte_p = $request->input('data.answer9b_total_staffpendukung_d3_fte_p');

        $answers9b->staffpendukung_belowd3_l = $request->input('data.answer9b_total_staffpendukung_belowd3_l');
        $answers9b->staffpendukung_belowd3_p = $request->input('data.answer9b_total_staffpendukung_belowd3_p');
        $answers9b->staffpendukung_belowd3_fte_l = $request->input('data.answer9b_total_staffpendukung_belowd3_fte_l');
        $answers9b->staffpendukung_belowd3_fte_p = $request->input('data.answer9b_total_staffpendukung_belowd3_fte_p');

        $answers9b->save();
    }

    private function createNewAnswers9c(Answers $answers, Request $request){
        $deletedRows = Answers9c::where('id_answer', $answers->id_answer)->delete();

        $arr_s1_l = $request->input('data.answer9c_s1_l');
        $arr_s1_p = $request->input('data.answer9c_s1_p');
        $arr_s2_l = $request->input('data.answer9c_s2_l');
        $arr_s2_p = $request->input('data.answer9c_s2_p');
        $arr_s3_l = $request->input('data.answer9c_s3_l');
        $arr_s3_p = $request->input('data.answer9c_s3_p');


        foreach($arr_s1_l as $row_index => $s1_l){
            $answers9c = new Answers9c;
            $answers9c->s1_l = $arr_s1_l[$row_index];
            $answers9c->s1_p = $arr_s1_p[$row_index];
            $answers9c->s2_l = $arr_s2_l[$row_index];
            $answers9c->s2_p = $arr_s2_p[$row_index];
            $answers9c->s3_l = $arr_s3_l[$row_index];
            $answers9c->s3_p = $arr_s3_p[$row_index];
            $answers9c->save();
        }
    }

    private function createNewAnswers10(Answers $answers, Request $request){
        if($request->input('data.question10_switch') === 'on') {
            $answers10 = Answers10::firstOrNew(['id_answer' => $answers->id_answer]);
            $answers10->jumlah_peneliti_pemerintah = $request->input('data.answer10_jumlah_peneliti_pemerintah');
            $answers10->jumlah_peneliti_perguruantinggi = $request->input('data.answer10_jumlah_peneliti_perguruantinggi');
            $answers10->jumlah_peneliti_industri = $request->input('data.answer10_jumlah_peneliti_industri');
            $answers10->jumlah_peneliti_lembagaswadaya = $request->input('data.answer10_jumlah_peneliti_lembagaswadaya ');
            $answers10->jumlah_peneliti_asing = $request->input('data.answer10_jumlah_peneliti_asing ');
            $answers10->save();
        }
    }

    private function createNewAnswers11(Answers $answers, Request $request){
        if($request->input('data.question11_switch') === 'on') {
            $deletedRows = Answers11::where('id_answer', $answers->id_answer)->delete();

            $arr_code = $request->input('data.answer11_code');
            $arr_nama_jurnal = $request->input('data.answer11_nama_jurnal');
            $arr_jumlah = $request->input('data.answer11_jumlah');


            foreach ($arr_code as $row_index => $code) {
                $answers11 = new Answers11;
                $answers11->nama_jurnal = $arr_nama_jurnal[$row_index];
                $answers11->code = $arr_code[$row_index];
                $answers11->jumlah = $arr_jumlah[$row_index];
                $answers11->save();
            }
        }
    }

    private function createNewAnswers12(Answers $answers, Request $request){
        if($request->input('data.question12_switch') === 'on') {
            $deletedRows = Answers12::where('id_answer', $answers->id_answer)->delete();

            $arr_code = $request->input('data.answer12_code');
            $arr_nama_jurnal = $request->input('data.answer12_nama_jurnal');
            $arr_jumlah = $request->input('data.answer12_jumlah');


            foreach ($arr_code as $row_index => $code) {
                $answers12 = new Answers12;
                $answers12->nama_jurnal = $arr_nama_jurnal[$row_index];
                $answers12->code = $arr_code[$row_index];
                $answers12->jumlah = $arr_jumlah[$row_index];
                $answers12->save();
            }
        }
    }

    private function createNewAnswers13(Answers $answers, Request $request){
        if($request->input('data.question13_switch') === 'on') {
            $deletedRows = Answers13::where('id_answer', $answers->id_answer)->delete();

            $arr_nama_peneliti = $request->input('data.answer13_nama_peneliti');
            $arr_nama_seminar = $request->input('data.answer13_nama_seminar');
            $arr_negara_penyelenggara_seminar = $request->input('data.answer13_negara_penyelenggara_seminar');


            foreach ($arr_nama_peneliti as $row_index => $code) {
                $answers13 = new Answers13;
                $answers13->nama_peneliti = $arr_nama_peneliti[$row_index];
                $answers13->nama_seminar = $arr_nama_seminar[$row_index];
                $answers13->negara_penyelenggara_seminar = $arr_negara_penyelenggara_seminar[$row_index];
                $answers13->save();
            }
        }
    }

    private function createNewAnswers14(Answers $answers, Request $request){
        if($request->input('data.question14_switch') === 'on') {
            $deletedRows = Answers14::where('id_answer', $answers->id_answer)->delete();

            $arr_nama_penerima_award = $request->input('data.answer14_nama_penerima_award');
            $arr_nama_award = $request->input('data.answer14_nama_award');
            $arr_institusi_pemberi_award = $request->input('data.answer14_institusi_pemberi_award');


            foreach ($arr_nama_penerima_award as $row_index => $code) {
                $answers14 = new Answers14;
                $answers14->nama_penerima_award = $arr_nama_penerima_award[$row_index];
                $answers14->nama_award = $arr_nama_award[$row_index];
                $answers14->institusi_pemberi_award = $arr_institusi_pemberi_award[$row_index];
                $answers14->save();
            }
        }
    }

    private function createNewAnswers15a(Answers $answers, Request $request){
        if($request->input('data.question15_switch') === 'on') {
            $deletedRows = Answers15a::where('id_answer', $answers->id_answer)->delete();

            $arr_nama_barang = $request->input('data.answer15a_nama_barang');
            $arr_terkomersialisasi = $request->input('data.answer15a_terkomersialisasi');
            $arr_tahun = $request->input('data.answer15a_tahun');


            foreach ($arr_nama_barang as $row_index => $code) {
                $answers15a = new Answers15a;
                $answers15a->nama_barang = $arr_nama_barang[$row_index];
                $answers15a->terkomersialisasi = $arr_terkomersialisasi[$row_index];
                $answers15a->tahun = $arr_tahun[$row_index];
                $answers15a->save();
            }
        }
    }

    private function createNewAnswers15b(Answers $answers, Request $request){
        if($request->input('data.question15_switch') === 'on') {
            $deletedRows = Answers15b::where('id_answer', $answers->id_answer)->delete();

            $arr_nama_jasa = $request->input('data.answer15b_nama_jasa');
            $arr_pengguna_jasa = $request->input('data.answer15b_pengguna_jasa');
            $arr_tahun = $request->input('data.answer15b_tahun');


            foreach ($arr_nama_jasa as $row_index => $code) {
                $answers15b = new Answers15b;
                $answers15b->nama_jasa = $arr_nama_jasa[$row_index];
                $answers15b->pengguna_jasa = $arr_pengguna_jasa[$row_index];
                $answers15b->tahun = $arr_tahun[$row_index];
                $answers15b->save();
            }
        }
    }

    private function createNewAnswers16a(Answers $answers, Request $request){
        if($request->input('data.question16_switch') === 'on') {
            $deletedRows = Answers16a::where('id_answer', $answers->id_answer)->delete();

            $arr_usulan_paten = $request->input('data.answer16a_usulan_paten');
            $arr_usulan_patensederhana = $request->input('data.answer16a_usulan_patensederhana');
            $arr_disetujui_paten = $request->input('data.answer16a_disetujui_paten');
            $arr_disetujui_patensederhana = $request->input('data.answer16a_disetujui_patensederhana');
            $arr_terkomersialisasi_paten = $request->input('data.answer16a_terkomersialisasi_paten');
            $arr_terkomersialisasi_patensederhana = $request->input('data.answer16a_terkomersialisasi_patensederhana');


            foreach ($arr_usulan_paten as $row_index => $code) {
                $answers16a = new Answers16a;
                $answers16a->usulan_paten = $arr_usulan_paten[$row_index];
                $answers16a->usulan_patensederhana = $arr_usulan_patensederhana[$row_index];
                $answers16a->disetujui_paten = $arr_disetujui_paten[$row_index];
                $answers16a->disetujui_patensederhana = $arr_disetujui_patensederhana[$row_index];
                $answers16a->terkomersialisasi_paten = $arr_terkomersialisasi_paten[$row_index];
                $answers16a->terkomersialisasi_patensederhana = $arr_terkomersialisasi_patensederhana[$row_index];
                $answers16a->save();
            }
        }
    }

    private function createNewAnswers16b(Answers $answers, Request $request){
        if($request->input('data.question16_switch') === 'on') {
            $answers16b = Answers16b::firstOrNew(['id_answer' => $answers->id_answer]);
            $answers16b->jumlah_patenluarnegeri = $request->input('data.answer16b_jumlah_patenluarnegeri');
            $answers16b->save();
        }
    }

    private function createNewAnswers17(Answers $answers, Request $request){
        if($request->input('data.question17_switch') === 'on') {
            $deletedRows = Answers17::where('id_answer', $answers->id_answer)->delete();

            $arr_lisensi = $request->input('data.answer17_lisensi');
            $arr_tahun = $request->input('data.answer17_tahun');
            $arr_nilai = $this->getValueFromNominalFormat($request->input('data.answer17_nilai'));


            foreach ($arr_lisensi as $row_index => $code) {
                $answers17 = new Answers17;
                $answers17->lisensi = $arr_lisensi[$row_index];
                $answers17->tahun = $arr_tahun[$row_index];
                $answers17->nilai = $arr_nilai[$row_index];
                $answers17->save();
            }
        }
    }

    private function createNewAnswers18(Answers $answers, Request $request){
        $answers18 =  Answers18::firstOrNew(['id_answer' => $answers->id_answer]);
        $answers18->comment = $request->input('data.answer18_comment');
        $answers18->save();
    }

    public function setQuestion(InterfaceQuestion $question){
        $this->questions[$question->getNumber()] = $question;
        return $this;
    }
}