<?php

namespace tests\app\Libraries\Questions;

use app\Libraries\Questions\Question3;

class Question3Test extends \TestCase{

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

    public function test_value_is_not_numeric(){
        $dipa = ['dana_pemerintah' => 'dana_pemerintah', 'PNBP' => 'PNBP', 'PHLN' => 100];
        $dana_lainnya = ['perusahaan_swasta' => 100, 'instansi_pemerintah' => 100, 'swasta_non_profit' => 100, 'luar_negeri' => 100];
        $Question3 = new Question3($dipa, $dana_lainnya);
        $this->assertFalse($Question3->isValidAnswer());
        $this->assertEquals('The dipa.dana pemerintah must be a number.', $Question3->getErrors()[0]);
        $this->assertEquals('The dipa. p n b p must be a number.', $Question3->getErrors()[1]);
    }

    public function test_value_is_null_then_get_error_required(){
        $dipa = ['dana_pemerintah' => null, 'PNBP' => 100, 'PHLN' => 100];
        $dana_lainnya = ['perusahaan_swasta' => null, 'instansi_pemerintah' => 100, 'swasta_non_profit' => 100, 'luar_negeri' => 100];
        $Question3 = new Question3($dipa, $dana_lainnya);
        $this->assertFalse($Question3->isValidAnswer());
        $this->assertEquals('The dipa.dana pemerintah field is required.', $Question3->getErrors()[0]);
        $this->assertEquals('The dana lainnya.perusahaan swasta field is required.', $Question3->getErrors()[1]);
    }
}