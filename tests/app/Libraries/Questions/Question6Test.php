<?php

namespace tests\app\Libraries\Questions;

use app\Libraries\Questions\Question6;
use Mockery;

class Question6Test extends \TestCase
{

    public function test_isValidAnswer_return_true()
    {
        $SocioEconomicsMock = Mockery::mock('\app\Libraries\SocioEconomics[getAll]');
        $SocioEconomicsMock->shouldReceive('getAll')->times(3)->andReturn([
            '01.01' => [],
            '01.02' => [],
            '01.03' => []
        ]);

        $Question6 = new Question6($SocioEconomicsMock);
        $Question6->setPersentaseDana('01.01', 50)->setPersentaseDana('01.02', 30)->setPersentaseDana('01.03', 20);
        $this->assertTrue($Question6->isValidAnswer());
        $this->assertEquals(array (
            'persentase_dana' =>
                array (
                    '01.01' => 50,
                    '01.02' => 30,
                    '01.03' => 20,
                ),
            'total_percentage' => 100,
        ), $Question6->getValidatedAnswer());
    }

    public function test_isValidAnswer_where_all_dana_is_null_then_return_error_count_dana(){
        $Question6 = new Question6();
        $this->assertFalse($Question6->isValidAnswer());
        $this->assertEquals('Kolom Persentase Dana harus memiliki jumlah index minimal 1.', $Question6->getErrors()['persentase_dana']);
    }

    public function test_isValidAnswer_where_total_percentage_size_is_not_100()
    {
        $SocioEconomicsMock = Mockery::mock('\app\Libraries\SocioEconomics[getAll]');
        $SocioEconomicsMock->shouldReceive('getAll')->times(3)->andReturn([
            '01.01' => [],
            '01.02' => [],
            '01.03' => []
        ]);


        $Question6 = new Question6($SocioEconomicsMock);
        $Question6->setPersentaseDana('01.01', 50)->setPersentaseDana('01.02', 30)->setPersentaseDana('01.03', 10);
        $this->assertFalse($Question6->isValidAnswer());
        $this->assertEquals('Kolom Total Persentase Realisasi Anggaran harus bernilai 100.', $Question6->getErrors()['total_percentage']);
    }

    public function test_isValidAnswer_where_dana_is_null()
    {
        $Question6 = new Question6();
        $Question6->setPersentaseDana('01.01', null)->setPersentaseDana('01.02', 30)->setPersentaseDana('01.03', 10);
        $this->assertFalse($Question6->isValidAnswer());
        $this->assertEquals('Kolom Persentase Dana : 01.01 harus diisi.', $Question6->getErrors()['persentase_dana.01.01']);
        $this->assertEquals('Kolom Total Persentase Realisasi Anggaran harus bernilai 100.', $Question6->getErrors()['total_percentage']);
    }

    public function test_isValidAnswer_where_dana_is_noy_numeric()
    {
        $SocioEconomicsMock = Mockery::mock('\app\Libraries\SocioEconomics[getAll]');
        $SocioEconomicsMock->shouldReceive('getAll')->times(3)->andReturn([
            '01.01' => [],
            '01.02' => [],
            '01.03' => []
        ]);

        $Question6 = new Question6($SocioEconomicsMock);
        $Question6->setPersentaseDana('01.01', 'A')->setPersentaseDana('01.02', 30)->setPersentaseDana('01.03', 10);
        $this->assertFalse($Question6->isValidAnswer());
        $this->assertEquals('Kolom Persentase Dana : 01.01 harus berisi angka.', $Question6->getErrors()['persentase_dana.01.01']);
        $this->assertEquals('Kolom Total Persentase Realisasi Anggaran harus bernilai 100.', $Question6->getErrors()['total_percentage']);
    }

    public function tearDown()
    {
        parent::tearDown();
        Mockery::close();
    }
}