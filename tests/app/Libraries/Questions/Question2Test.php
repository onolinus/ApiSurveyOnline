<?php

namespace tests\app\Libraries\Questions;

use app\Libraries\Questions\Question2;

class Question2Test extends \TestCase{

    public function test_isValidAnswer_return_true(){
        $Question2 = new Question2(100);
        $this->assertTrue($Question2->isValidAnswer());
        $this->assertEquals([
            'jumlah' => 100,
        ], $Question2->getValidatedAnswer());
    }


    public function test_getValidatedAnswer_skip_isValidAnswer_then_throw_exception(){
        $Question2 = new Question2(100);
        try{
            $this->assertEquals([
                'jumlah' => 100,
            ], $Question2->getValidatedAnswer());
        }catch(\Exception $e){
            $this->assertEquals('You must run the `isValidAnswer` after update the attribute', $e->getMessage());
        }
    }


    public function test_isValidAnswer_where_jumlah_is_null(){
        $Question2 = new Question2(null);
        $this->assertFalse($Question2->isValidAnswer());
        $this->assertEquals($Question2->getErrors()[0], 'The jumlah field is required.');
    }

    public function test_is_not_numeric_jumlah(){
        $Question2 = new Question2('jumlah');
        $this->assertFalse($Question2->isValidAnswer());
        $this->assertEquals($Question2->getErrors()[0], 'The jumlah must be a number.');
    }
}