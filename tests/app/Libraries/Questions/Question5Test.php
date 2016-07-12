<?php

namespace tests\app\Libraries\Questions;

use app\Libraries\Questions\Question5;
use Mockery;

class Question5Test extends \TestCase
{

    public function test_isValidAnswer_return_true()
    {
        $ResearchFieldsMock = Mockery::mock('\PluginCommonSurvey\Libraries\ResearchFields[getAll]');
        $ResearchFieldsMock->shouldReceive('getAll')->times(3)->andReturn([
            '01.01' => [],
            '01.02' => [],
            '02.01' => []
        ]);

        $Question5 = new Question5($ResearchFieldsMock);
        $Question5->setPersentaseDana('01.01', 50)->setPersentaseDana('01.02', 30)->setPersentaseDana('02.01', 20);
        $this->assertTrue($Question5->isValidAnswer());
        $this->assertEquals(array (
            'persentase_dana' =>
                array (
                    '01.01' => 50,
                    '01.02' => 30,
                    '02.01' => 20,
                ),
            'total_percentage' => 100,
        ), $Question5->getValidatedAnswer());
    }

    public function test_isValidAnswer_where_all_dana_is_null_then_return_error_count_dana(){
        $Question5 = new Question5();
        $this->assertFalse($Question5->isValidAnswer());
        $this->assertEquals('Kolom Persentase Dana harus memiliki jumlah index minimal 1.', $Question5->getErrors()['persentase_dana']);
    }

    public function test_isValidAnswer_where_total_percentage_size_is_not_100()
    {
        $ResearchFieldsMock = Mockery::mock('\PluginCommonSurvey\Libraries\ResearchFields[getAll]');
        $ResearchFieldsMock->shouldReceive('getAll')->times(3)->andReturn([
            '01.01' => [],
            '01.02' => [],
            '02.01' => []
        ]);


        $Question5 = new Question5($ResearchFieldsMock);
        $Question5->setPersentaseDana('01.01', 50)->setPersentaseDana('01.02', 30)->setPersentaseDana('02.01', 10);
        $this->assertFalse($Question5->isValidAnswer());
        $this->assertEquals('Kolom Total Persentase Realisasi Anggaran harus bernilai 100.', $Question5->getErrors()['total_percentage']);
    }

    public function test_isValidAnswer_where_dana_is_null()
    {
        $Question5 = new Question5();
        $Question5->setPersentaseDana('01.01', null)->setPersentaseDana('01.02', 30)->setPersentaseDana('02.01', 10);
        $this->assertFalse($Question5->isValidAnswer());
        $this->assertEquals('Kolom Persentase Dana : 01.01 harus diisi.', $Question5->getErrors()['persentase_dana.01.01']);
        $this->assertEquals('Kolom Total Persentase Realisasi Anggaran harus bernilai 100.', $Question5->getErrors()['total_percentage']);
    }

    public function test_isValidAnswer_where_dana_is_noy_numeric()
    {
        $ResearchFieldsMock = Mockery::mock('\PluginCommonSurvey\Libraries\ResearchFields[getAll]');
        $ResearchFieldsMock->shouldReceive('getAll')->times(3)->andReturn([
            '01.01' => [],
            '01.02' => [],
            '02.01' => []
        ]);

        $Question5 = new Question5($ResearchFieldsMock);
        $Question5->setPersentaseDana('01.01', 'A')->setPersentaseDana('01.02', 30)->setPersentaseDana('02.01', 10);
        $this->assertFalse($Question5->isValidAnswer());
        $this->assertEquals('Kolom Persentase Dana : 01.01 harus berisi angka.', $Question5->getErrors()['persentase_dana.01.01']);
        $this->assertEquals('Kolom Total Persentase Realisasi Anggaran harus bernilai 100.', $Question5->getErrors()['total_percentage']);
    }

    public function tearDown()
    {
        parent::tearDown();
        Mockery::close();
    }
}