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

class Survey{

    private $questions = [], $errors = [];

    CONST COUNT_QUEST = 5;

    private $bail = false;

    const STATUS_REJECT = 'ditolak';
    const STATUS_ACCEPTED = 'diterima';
    const STATUS_SENT = 'terkirim';
    const STATUS_VALIDATING = 'prosesvalidasi';

    /**
     * @var \Illuminate\Validation\Validator
     */
    protected $validator;

    /**
     * @var SessionTokenAccessor $sessionTokenAccessor
     */
    private $sessionTokenAccessor;

    public function __construct(SessionTokenAccessor $sessionTokenAccessor = null)
    {
        $this->setListOfQuestions();
        $this->sessionTokenAccessor = is_null($sessionTokenAccessor) ? SessionTokenAccessor::getInstance() : $sessionTokenAccessor;
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


    public function getListAnswers($userId = null){
        $SurveyDb = new SurveyDb();
        return $SurveyDb->getListAnswers($userId === null ? $this->sessionTokenAccessor->getSessionUserID() : $userId);
    }

    public function getListComment($userId = null){
        $SurveyDb = new SurveyDb();
        return $SurveyDb->getListComment($userId === null ? $this->sessionTokenAccessor->getSessionUserID() : $userId);
    }

    public function getListAnswersStatus($userId = null){
        $SurveyDb = new SurveyDb();
        return $SurveyDb->getListAnswersStatus($userId === null ? $this->sessionTokenAccessor->getSessionUserID() : $userId);
    }

//    public function getListAnswersById($userId){
//        $SurveyDb = new SurveyDb();
//        return $SurveyDb->getListAnswers($userId);
//    }

    private function getValueFromNominalFormat($nominal){
        $nominal = preg_replace('/[\.]/', '', $nominal);
        $nominal = preg_replace('/(,\d+)$/', '', $nominal);
        return floatval($nominal);
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
        $answers =  Answers::firstOrNew(['id_correspondent' => $this->sessionTokenAccessor->getSessionUserID()]);
        $answers->status = @$answers->status === self::STATUS_REJECT ? self::STATUS_VALIDATING : self::STATUS_SENT;
        $answers->save();

        return $answers;
    }

    private function createNewAnswers1(Answers $answers, Request $request){
        $answers1 =  Answers1::firstOrNew(['id_answer' => $answers->id]);
        $answers1->status = self::STATUS_SENT;
        $answers1->total = $this->getValueFromNominalFormat($request->input('data.answer1_total'));
        $answers1->percentage = $request->input('data.answer1_percentage');
        $answers1->save();

        return $answers1;
    }

    private function createNewAnswers2(Answers $answers, Request $request){
        $answers2 =  Answers2::firstOrNew(['id_answer' => $answers->id]);
        $answers2->status = self::STATUS_SENT;
        $answers2->jumlah = $this->getValueFromNominalFormat($request->input('data.answer2_jumlah'));
        $answers2->save();

        return $answers2;
    }

    private function createNewAnswers3(Answers $answers, Request $request){
        $answers3 =  Answers3::firstOrNew(['id_answer' => $answers->id]);
        $answers3->status = self::STATUS_SENT;
        $answers3->dipa_danapemerintah = $this->getValueFromNominalFormat($request->input('data.answer3_dipa_danapemerintah'));
        $answers3->dipa_pnbp_perusahaanswasta = $this->getValueFromNominalFormat($request->input('data.answer3_dipa_pnbp_perusahaanswasta'));
        $answers3->dipa_pnbp_instansipemerintah = $this->getValueFromNominalFormat($request->input('data.answer3_dipa_pnbp_instansipemerintah'));
        $answers3->dipa_pnbp_swastanonprofit = $this->getValueFromNominalFormat($request->input('data.answer3_dipa_pnbp_swastanonprofit'));
        $answers3->dipa_pnbp_luarnegeri = $this->getValueFromNominalFormat($request->input('data.answer3_dipa_pnbp_luarnegeri'));
        $answers3->dipa_phln = $this->getValueFromNominalFormat($request->input('data.answer3_dipa_phln'));
        $answers3->nondipa_insentif_ristekdikti = $this->getValueFromNominalFormat($request->input('data.answer3_nondipa_insentif_ristekdikti'));
        $answers3->nondipa_insentif_dalamnegeri = $this->getValueFromNominalFormat($request->input('data.answer3_nondipa_insentif_dalamnegeri'));
        $answers3->nondipa_insentif_researchgrant = $this->getValueFromNominalFormat($request->input('data.answer3_nondipa_insentif_researchgrant'));
        $answers3->save();

        return $answers3;
    }

    private function createNewAnswers4(Answers $answers, Request $request){
        $answers4 =  Answers4::firstOrNew(['id_answer' => $answers->id]);
        $answers4->status = self::STATUS_SENT;
        $answers4->belanja_pegawai_upah = $this->getValueFromNominalFormat($request->input('data.answer4_belanja_pegawai_upah'));
        $answers4->belanja_modal_properti = $this->getValueFromNominalFormat($request->input('data.answer4_belanja_modal_properti'));
        $answers4->belanja_modal_mesin = $this->getValueFromNominalFormat($request->input('data.answer4_belanja_modal_mesin'));
        $answers4->belanja_operasional_maintenance = $this->getValueFromNominalFormat($request->input('data.answer4_belanja_operasional_maintenance'));
        $answers4->save();

        return $answers4;
    }

    private function createNewAnswers5(Answers $answers, Request $request){
        $deletedRows = Answers5::where('id_answer', $answers->id)->delete();

        $codes = $request->input('data.answer5_code');
        $percentages = $request->input('data.answer5_percentage');

        $arr_answers = [];

        foreach($codes as $row_index => $code){
            $answers5 = new Answers5;
            $answers5->status = self::STATUS_SENT;
            $answers5->code = $code;
            $answers5->percentage = $percentages[$row_index];
            $answers5->id_answer = $answers->id;
            $answers5->save();
            $arr_answers[] = $answers5;
        }

        return $arr_answers;
    }

    private function createNewAnswers6(Answers $answers, Request $request){
        $deletedRows = Answers6::where('id_answer', $answers->id)->delete();

        $codes = $request->input('data.answer6_code');
        $percentages = $request->input('data.answer6_percentage');

        $arr_answers = [];

        foreach($codes as $row_index => $code){
            $answers6 = new Answers6;
            $answers6->status = self::STATUS_SENT;
            $answers6->code = $code;
            $answers6->percentage = $percentages[$row_index];
            $answers6->id_answer = $answers->id;
            $answers6->save();
            $arr_answers[] = $answers6;
        }

        return $arr_answers;
    }

    private function createNewAnswers7(Answers $answers, Request $request){
        $answers7 =  Answers7::firstOrNew(['id_answer' => $answers->id]);
        $answers7->status = self::STATUS_SENT;
        $answers7->penelitian_dasar = $this->getValueFromNominalFormat($request->input('data.answer7_penelitian_dasar'));
        $answers7->penelitian_terapan = $this->getValueFromNominalFormat($request->input('data.answer7_penelitian_terapan'));
        $answers7->pengembangan_eksperimental = $this->getValueFromNominalFormat($request->input('data.answer7_pengembangan_eksperimental'));
        $answers7->save();

        return $answers7;
    }

    private function createNewAnswers8(Answers $answers, Request $request){
        Answers8::where('id_answer', $answers->id)->delete();

        if($request->input('data.question8_switch') === 'on') {
            $arr_institusi = $request->input('data.answer8_institusi');
            $arr_jumlah_dana = $request->input('data.answer8_jumlah_dana');

            $arr_answers = [];

            foreach ($arr_institusi as $row_index => $institusi) {
                $answers8 = new Answers8;
                $answers8->status = self::STATUS_SENT;
                $answers8->institusi = $arr_institusi[$row_index];
                $answers8->jumlah_dana = $this->getValueFromNominalFormat($arr_jumlah_dana[$row_index]);
                $answers8->id_answer = $answers->id;
                $answers8->save();
                $arr_answers[] = $answers8;
            }

            return $arr_answers;
        }

        return [];
    }

    private function createNewAnswers9a(Answers $answers, Request $request){
        $answers9a =  Answers9a::firstOrNew(['id_answer' => $answers->id]);
        $answers9a->status = self::STATUS_SENT;
        $answers9a->total_pegawai = $request->input('data.answer9a_total_pegawai');
        $answers9a->save();

        return $answers9a;
    }

    private function createNewAnswers9b(Answers $answers, Request $request){
        //1.1 Peneliti dengan jabatan fungsional Peneliti
        $answers9b =  Answers9b::firstOrNew(['id_answer' => $answers->id]);
        $answers9b->status = self::STATUS_SENT;
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

        return $answers9b;
    }

    private function createNewAnswers9c(Answers $answers, Request $request){
        $deletedRows = Answers9c::where('id_answer', $answers->id)->delete();

        $arr_klasifikasi = $request->input('data.answer9c_klasifikasi');
        $arr_s1_l = $request->input('data.answer9c_s1_l');
        $arr_s1_p = $request->input('data.answer9c_s1_p');
        $arr_s2_l = $request->input('data.answer9c_s2_l');
        $arr_s2_p = $request->input('data.answer9c_s2_p');
        $arr_s3_l = $request->input('data.answer9c_s3_l');
        $arr_s3_p = $request->input('data.answer9c_s3_p');


        foreach($arr_klasifikasi as $row_index => $code){
            $answers9c = new Answers9c;
            $answers9c->status = self::STATUS_SENT;
            $answers9c->code = $arr_klasifikasi[$row_index];
            $answers9c->s1_l = $arr_s1_l[$row_index];
            $answers9c->s1_p = $arr_s1_p[$row_index];
            $answers9c->s2_l = $arr_s2_l[$row_index];
            $answers9c->s2_p = $arr_s2_p[$row_index];
            $answers9c->s3_l = $arr_s3_l[$row_index];
            $answers9c->s3_p = $arr_s3_p[$row_index];
            $answers9c->id_answer = $answers->id;
            $answers9c->save();
        }
    }

    private function createNewAnswers10(Answers $answers, Request $request){

        if($request->input('data.question10_switch') === 'on') {
            $answers10 = Answers10::firstOrNew(['id_answer' => $answers->id]);
            $answers10->status = self::STATUS_SENT;
            $answers10->jumlah_peneliti_pemerintah = $request->input('data.answer10_jumlah_peneliti_pemerintah');
            $answers10->jumlah_peneliti_perguruantinggi = $request->input('data.answer10_jumlah_peneliti_perguruantinggi');
            $answers10->jumlah_peneliti_industri = $request->input('data.answer10_jumlah_peneliti_industri');
            $answers10->jumlah_peneliti_lembagaswadaya = $request->input('data.answer10_jumlah_peneliti_lembagaswadaya');
            $answers10->jumlah_peneliti_asing = $request->input('data.answer10_jumlah_peneliti_asing');
            $answers10->save();

            return $answers10;
        }else{
            Answers10::where('id_answer', $answers->id)->delete();
        }

        return null;
    }

    private function createNewAnswers11(Answers $answers, Request $request){
        Answers11::where('id_answer', $answers->id)->delete();

        if($request->input('data.question11_switch') === 'on') {

            $arr_code = $request->input('data.answer11_code');
            $arr_nama_jurnal = $request->input('data.answer11_nama_jurnal');
            $arr_jumlah = $request->input('data.answer11_jumlah');

            $arr_answers = [];

            foreach ($arr_code as $row_index => $code) {
                $answers11 = new Answers11;
                $answers11->status = self::STATUS_SENT;
                $answers11->nama_jurnal = $arr_nama_jurnal[$row_index];
                $answers11->code = $arr_code[$row_index];
                $answers11->jumlah = $arr_jumlah[$row_index];
                $answers11->id_answer = $answers->id;
                $answers11->save();

                $arr_answers[] = $answers11;
            }

            return $arr_answers;
        }

        return [];
    }

    private function createNewAnswers12(Answers $answers, Request $request){
        Answers12::where('id_answer', $answers->id)->delete();

        if($request->input('data.question12_switch') === 'on') {

            $arr_code = $request->input('data.answer12_code');
            $arr_nama_jurnal = $request->input('data.answer12_nama_jurnal');
            $arr_jumlah = $request->input('data.answer12_jumlah');

            $arr_answers = [];

            foreach ($arr_code as $row_index => $code) {
                $answers12 = new Answers12;
                $answers12->status = self::STATUS_SENT;
                $answers12->nama_jurnal = $arr_nama_jurnal[$row_index];
                $answers12->code = $arr_code[$row_index];
                $answers12->jumlah = $arr_jumlah[$row_index];
                $answers12->id_answer = $answers->id;
                $answers12->save();
                $arr_answers[] = $answers12;
            }

            return $arr_answers;
        }

        return [];
    }

    private function createNewAnswers13(Answers $answers, Request $request){
        Answers13::where('id_answer', $answers->id)->delete();

        if($request->input('data.question13_switch') === 'on') {

            $arr_nama_peneliti = $request->input('data.answer13_nama_peneliti');
            $arr_nama_seminar = $request->input('data.answer13_nama_seminar');
            $arr_negara_penyelenggara_seminar = $request->input('data.answer13_negara_penyelenggara_seminar');

            $arr_answers = [];

            foreach ($arr_nama_peneliti as $row_index => $code) {
                $answers13 = new Answers13;
                $answers13->status = self::STATUS_SENT;
                $answers13->nama_peneliti = $arr_nama_peneliti[$row_index];
                $answers13->nama_seminar = $arr_nama_seminar[$row_index];
                $answers13->negara_penyelenggara_seminar = $arr_negara_penyelenggara_seminar[$row_index];
                $answers13->id_answer = $answers->id;
                $answers13->save();
                $arr_answers[] = $answers13;
            }

            return $arr_answers;
        }

        return [];
    }

    private function createNewAnswers14(Answers $answers, Request $request){
        Answers14::where('id_answer', $answers->id)->delete();

        if($request->input('data.question14_switch') === 'on') {

            $arr_nama_penerima_award = $request->input('data.answer14_nama_penerima_award');
            $arr_nama_award = $request->input('data.answer14_nama_award');
            $arr_institusi_pemberi_award = $request->input('data.answer14_institusi_pemberi_award');

            $arr_answers = [];

            foreach ($arr_nama_penerima_award as $row_index => $code) {
                $answers14 = new Answers14;
                $answers14->status = self::STATUS_SENT;
                $answers14->nama_penerima_award = $arr_nama_penerima_award[$row_index];
                $answers14->nama_award = $arr_nama_award[$row_index];
                $answers14->institusi_pemberi_award = $arr_institusi_pemberi_award[$row_index];
                $answers14->id_answer = $answers->id;
                $answers14->save();
                $arr_answers[] = $answers14;
            }

            return $arr_answers;
        }

        return [];
    }

    private function createNewAnswers15a(Answers $answers, Request $request){
        Answers15a::where('id_answer', $answers->id)->delete();

        if($request->input('data.question15_switch') === 'on') {
            $arr_nama_barang = $request->input('data.answer15a_nama_barang');
            $arr_terkomersialisasi = $request->input('data.answer15a_terkomersialisasi');
            $arr_tahun = $request->input('data.answer15a_tahun');

            $arr_answers = [];

            foreach ($arr_nama_barang as $row_index => $code) {
                $answers15a = new Answers15a;
                $answers15a->status = self::STATUS_SENT;
                $answers15a->nama_barang = $arr_nama_barang[$row_index];
                $answers15a->terkomersialisasi = $arr_terkomersialisasi[$row_index];
                $answers15a->tahun = $arr_tahun[$row_index];
                $answers15a->id_answer = $answers->id;
                $answers15a->save();
                $arr_answers[] = $answers15a;
            }

            return $arr_answers;
        }

        return [];
    }

    private function createNewAnswers15b(Answers $answers, Request $request){
        Answers15b::where('id_answer', $answers->id)->delete();
        if($request->input('data.question15_switch') === 'on') {
            $arr_nama_jasa = $request->input('data.answer15b_nama_jasa');
            $arr_pengguna_jasa = $request->input('data.answer15b_pengguna_jasa');
            $arr_tahun = $request->input('data.answer15b_tahun');

            $arr_answers = [];

            foreach ($arr_nama_jasa as $row_index => $code) {
                $answers15b = new Answers15b;
                $answers15b->status = self::STATUS_SENT;
                $answers15b->nama_jasa = $arr_nama_jasa[$row_index];
                $answers15b->pengguna_jasa = $arr_pengguna_jasa[$row_index];
                $answers15b->tahun = $arr_tahun[$row_index];
                $answers15b->id_answer = $answers->id;
                $answers15b->save();
                $arr_answers[] = $answers15b;
            }

            return $arr_answers;
        }

        return [];
    }

    private function createNewAnswers16a(Answers $answers, Request $request){
        Answers16a::where('id_answer', $answers->id)->delete();

        if($request->input('data.question16_switch') === 'on') {
            $arr_tahun = $request->input('data.answer16a_tahun');
            $arr_usulan_paten = $request->input('data.answer16a_usulan_paten');
            $arr_usulan_patensederhana = $request->input('data.answer16a_usulan_patensederhana');
            $arr_disetujui_paten = $request->input('data.answer16a_disetujui_paten');
            $arr_disetujui_patensederhana = $request->input('data.answer16a_disetujui_patensederhana');
            $arr_terkomersialisasi_paten = $request->input('data.answer16a_terkomersialisasi_paten');
            $arr_terkomersialisasi_patensederhana = $request->input('data.answer16a_terkomersialisasi_patensederhana');

            $arr_answers = [];

            foreach ($arr_usulan_paten as $row_index => $code) {
                $answers16a = new Answers16a;
                $answers16a->status = self::STATUS_SENT;
                $answers16a->tahun = $arr_tahun[$row_index];
                $answers16a->usulan_paten = $arr_usulan_paten[$row_index];
                $answers16a->usulan_patensederhana = $arr_usulan_patensederhana[$row_index];
                $answers16a->disetujui_paten = $arr_disetujui_paten[$row_index];
                $answers16a->disetujui_patensederhana = $arr_disetujui_patensederhana[$row_index];
                $answers16a->terkomersialisasi_paten = $arr_terkomersialisasi_paten[$row_index];
                $answers16a->terkomersialisasi_patensederhana = $arr_terkomersialisasi_patensederhana[$row_index];
                $answers16a->id_answer = $answers->id;
                $answers16a->save();
                $arr_answers[] = $answers16a;
            }

            return $arr_answers;
        }

        return [];
    }

    private function createNewAnswers16b(Answers $answers, Request $request){
        if($request->input('data.question16_switch') === 'on') {
            $answers16b = Answers16b::firstOrNew(['id_answer' => $answers->id]);
            $answers16b->status = self::STATUS_SENT;
            $answers16b->jumlah_patenluarnegeri = $request->input('data.answer16b_jumlah_patenluarnegeri');
            $answers16b->save();

            return $answers16b;
        }else{
            Answers16b::where('id_answer', $answers->id)->delete();
        }

        return null;
    }

    private function createNewAnswers17(Answers $answers, Request $request){
        Answers17::where('id_answer', $answers->id)->delete();

        if($request->input('data.question17_switch') === 'on') {
            $arr_lisensi = $request->input('data.answer17_lisensi');
            $arr_tahun = $request->input('data.answer17_tahun');
            $arr_nilai = $request->input('data.answer17_nilai');

            $arr_answers = [];

            foreach ($arr_lisensi as $row_index => $code) {
                $answers17 = new Answers17;
                $answers17->status = self::STATUS_SENT;
                $answers17->lisensi = $arr_lisensi[$row_index];
                $answers17->tahun = $arr_tahun[$row_index];
                $answers17->nilai = $this->getValueFromNominalFormat($arr_nilai[$row_index]);
                $answers17->id_answer = $answers->id;
                $answers17->save();
                $arr_answers[] = $answers17;
            }

            return $arr_answers;
        }

        return [];
    }

    private function createNewAnswers18(Answers $answers, Request $request){
        $answers18 =  Answers18::firstOrNew(['id_answer' => $answers->id]);
        $answers18->status = self::STATUS_SENT;
        $answers18->comment = $request->input('data.answer18_comment');
        $answers18->save();
        return $answers18;
    }

    public function setQuestion(InterfaceQuestion $question){
        $this->questions[$question->getNumber()] = $question;
        return $this;
    }
}