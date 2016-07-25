<?php

namespace tests\app\Libraries\Questions;

use app\Libraries\Questions\Question3;

class Question3Test extends \PHPUnit_Framework_TestCase{

    public function test_isValidAnswer_return_true(){
        $dipa = ['dana_pemerintah' => 100, 'PNBP' => 100, 'PHLN' => 100];
        $dana_lainnya = ['perusahaan_swasta' => 100, 'instansi_pemerintah' => 100, 'swasta_non_profit' => 100, 'luar_negeri' => 100];
        $Question3 = new Question3($dipa, $dana_lainnya);
        $this->assertTrue($Question3->isValidAnswer());
        $this->assertEquals([
            'dipa' => $dipa,
            'dana_lainnya' => $dana_lainnya
        ], $Question3->getValidatedAnswer());
    }

    public function test_isValidAnswer_where_all_belanja_is_null(){
        $Question3 = new Question3();
        $this->assertFalse($Question3->isValidAnswer());
        $this->assertEquals("Kolom Dana dari Pemerintah harus diisi.", $Question3->getErrors()['dipa.dana_pemerintah']);
        $this->assertEquals("Kolom PNBP harus diisi.", $Question3->getErrors()['dipa.PNBP']);
        $this->assertEquals("Kolom PHLN harus diisi.", $Question3->getErrors()['dipa.PHLN']);
        $this->assertEquals("Kolom Perusahaan Swasta harus diisi.", $Question3->getErrors()['dana_lainnya.perusahaan_swasta']);
        $this->assertEquals("Kolom Instansi Pemerintah harus diisi.", $Question3->getErrors()['dana_lainnya.instansi_pemerintah']);
        $this->assertEquals("Kolom Swasta non profit harus diisi.", $Question3->getErrors()['dana_lainnya.swasta_non_profit']);
        $this->assertEquals("Kolom Dari Luar Negeri harus diisi.", $Question3->getErrors()['dana_lainnya.luar_negeri']);
    }

    public function test_value_is_not_numeric(){
        $dipa = ['dana_pemerintah' => 'dana_pemerintah', 'PNBP' => 'PNBP', 'PHLN' => 100];
        $dana_lainnya = ['perusahaan_swasta' => 100, 'instansi_pemerintah' => 100, 'swasta_non_profit' => 100, 'luar_negeri' => 100];
        $Question3 = new Question3($dipa, $dana_lainnya);
        $this->assertFalse($Question3->isValidAnswer());
        $this->assertEquals('Kolom Dana dari Pemerintah harus berisi angka.', $Question3->getErrors()['dipa.dana_pemerintah']);
        $this->assertEquals('Kolom PNBP harus berisi angka.', $Question3->getErrors()['dipa.PNBP']);
    }

    public function test_value_is_null_then_get_error_required(){
        $dipa = ['dana_pemerintah' => null, 'PNBP' => 100, 'PHLN' => 100];
        $dana_lainnya = ['perusahaan_swasta' => null, 'instansi_pemerintah' => 100, 'swasta_non_profit' => 100, 'luar_negeri' => 100];
        $Question3 = new Question3($dipa, $dana_lainnya);
        $this->assertFalse($Question3->isValidAnswer());
        $this->assertEquals('Kolom Dana dari Pemerintah harus diisi.', $Question3->getErrors()['dipa.dana_pemerintah']);
        $this->assertEquals('Kolom Perusahaan Swasta harus diisi.', $Question3->getErrors()['dana_lainnya.perusahaan_swasta']);
    }
}