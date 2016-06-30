<?php

namespace tests\app\Libraries\Questions;

use app\Libraries\Questions\Question1;

class Question1Test extends \TestCase{

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
            $this->assertEquals('You must run the `isValidAnswer` after update the attribute', $e->getMessage());
        }
    }


    public function test_isValidAnswer_where_total_and_percentage_is_null(){
        $Question1 = new Question1(null, null);
        $this->assertFalse($Question1->isValidAnswer());
        $this->assertEquals($Question1->getErrors()[0], 'The total field is required.');
        $this->assertEquals($Question1->getErrors()[1], 'The percentage field is required.');
    }

    public function test_isValidAnswer_where_percentage_is_null(){
        $Question1 = new Question1(1, null);
        $this->assertFalse($Question1->isValidAnswer());
        $this->assertEquals($Question1->getErrors()[0], 'The percentage field is required.');
    }

    public function test_isValidAnswer_where_total_is_null(){
        $Question1 = new Question1(null, 100);
        $this->assertFalse($Question1->isValidAnswer());
        $this->assertEquals($Question1->getErrors()[0], 'The total field is required.');
    }

    public function test_isValidAnswer_where_percentage_greater_than_100(){
        $Question1 = new Question1(1, 105);
        $this->assertFalse($Question1->isValidAnswer());
        $this->assertEquals($Question1->getErrors()[0], 'The percentage may not be greater than 100.');
    }

    public function test_is_not_numeric_total(){
        $Question1 = new Question1('total', 101);
        $this->assertFalse($Question1->isValidAnswer());
        $this->assertEquals($Question1->getErrors()[0], 'The total must be a number.');
        $this->assertEquals($Question1->getErrors()[1], 'The percentage may not be greater than 100.');
    }

    public function test_is_not_numeric_percentage(){
        $Question1 = new Question1(1, 'percentage');
        $this->assertFalse($Question1->isValidAnswer());
        $this->assertEquals($Question1->getErrors()[0], 'The percentage must be a number.');
    }
}