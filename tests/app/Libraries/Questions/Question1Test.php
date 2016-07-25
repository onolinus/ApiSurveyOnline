<?php

namespace tests\app\Libraries\Questions;

use app\Libraries\Questions\Question1;

class Question1Test extends \PHPUnit_Framework_TestCase{

    public function setUp()
    {
        parent::setUp();
    }

    public function test_isValidAnswer_return_true(){
        $Question1 = new Question1(100.9, 100);
        $this->assertTrue($Question1->isValidAnswer());
        $this->assertEquals([
            'total' => 100.9,
            'percentage' => 100,
        ], $Question1->getValidatedAnswer());
    }


    public function test_getValidatedAnswer_skip_isValidAnswer_then_throw_exception(){
        $Question1 = new Question1(100.9, 100);
        try{
            $this->assertEquals([
                'total' => 100.9,
                'percentage' => 100,
            ], $Question1->getValidatedAnswer());
        }catch(\Exception $e){
            $this->assertEquals('You must run the `isValidAnswer` `after update the attribute` or `before getErrors`', $e->getMessage());
        }
    }


    public function test_isValidAnswer_where_total_and_percentage_is_null(){
        $Question1 = new Question1(null, null);
        $this->assertFalse($Question1->isValidAnswer());
        $this->assertEquals('Kolom Total Realisasi Anggaran harus diisi.', $Question1->getErrors()['total']);
        $this->assertEquals('Kolom Persentase Realisasi Anggaran harus diisi.', $Question1->getErrors()['percentage']);
    }

    public function test_isValidAnswer_where_percentage_is_null(){
        $Question1 = new Question1(1, null);
        $this->assertFalse($Question1->isValidAnswer());
        $this->assertEquals('Kolom Persentase Realisasi Anggaran harus diisi.', $Question1->getErrors()['percentage']);
    }

    public function test_isValidAnswer_where_total_is_null(){
        $Question1 = new Question1(null, 100);
        $this->assertFalse($Question1->isValidAnswer());
        $this->assertEquals('Kolom Total Realisasi Anggaran harus diisi.', $Question1->getErrors()['total']);
    }

    public function test_isValidAnswer_where_percentage_greater_than_100(){
        $Question1 = new Question1(1, 105);
        $this->assertFalse($Question1->isValidAnswer());
        $this->assertEquals('Kolom Persentase Realisasi Anggaran harus memiliki nilai maximal 100.', $Question1->getErrors()['percentage']);
    }

    public function test_is_not_numeric_total(){
        $Question1 = new Question1('total', 101);
        $this->assertFalse($Question1->isValidAnswer());
        $this->assertEquals('Kolom Total Realisasi Anggaran harus berisi angka.', $Question1->getErrors()['total']);
        $this->assertEquals('Kolom Persentase Realisasi Anggaran harus memiliki nilai maximal 100.', $Question1->getErrors()['percentage']);
    }

    public function test_is_not_numeric_percentage(){
        $Question1 = new Question1(1, 'percentage');
        $this->assertFalse($Question1->isValidAnswer());
        $this->assertEquals('Kolom Persentase Realisasi Anggaran harus berisi sebuah integer.', $Question1->getErrors()['percentage']);
    }
}