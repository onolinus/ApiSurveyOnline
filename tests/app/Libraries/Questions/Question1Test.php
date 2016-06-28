<?php

namespace tests\app\Libraries\Questions;

use app\Libraries\Questions\Question1;

class Question1Test extends \TestCase{

    /**
     * @var Question1
     */
    private $Question1;

    public function setUp()
    {
        parent::setUp();
        $this->Question1 = new Question1();
    }

    public function test_isValidAnswer_return_true(){
        $this->assertTrue($this->Question1->isValidAnswer([
            'total' => '100',
            'percentage' => '100'
        ]));
    }

    public function test_isValidAnswer_where_total_and_percentage_is_null(){
        $this->assertFalse($this->Question1->isValidAnswer([
        ]));

        $this->assertEquals($this->Question1->getErrors()[0], 'The total field is required.');
        $this->assertEquals($this->Question1->getErrors()[1], 'The percentage field is required.');
    }

    public function test_isValidAnswer_where_percentage_is_null(){
        $this->assertFalse($this->Question1->isValidAnswer([
            'total' => '1',
        ]));

        $this->assertEquals($this->Question1->getErrors()[0], 'The percentage field is required.');
    }

    public function test_isValidAnswer_where_total_is_null(){
        $this->assertFalse($this->Question1->isValidAnswer([
            'percentage' => '100',
        ]));

        $this->assertEquals($this->Question1->getErrors()[0], 'The total field is required.');
    }

    public function test_isValidAnswer_where_percentage_greater_than_100(){
        $this->assertFalse($this->Question1->isValidAnswer([
            'total' => '1',
            'percentage' => '200'
        ]));

        $this->assertEquals($this->Question1->getErrors()[0], 'The percentage may not be greater than 100.');
    }

    public function test_is_not_numeric_total(){
        $this->assertFalse($this->Question1->isValidAnswer([
            'total' => 'a',
            'percentage' => '200'
        ]));

        $this->assertEquals($this->Question1->getErrors()[0], 'The total must be a number.');
    }

    public function test_is_not_numeric_percentage(){
        $this->assertFalse($this->Question1->isValidAnswer([
            'total' => '1',
            'percentage' => 'a'
        ]));

        $this->assertEquals($this->Question1->getErrors()[0], 'The percentage must be a number.');
    }
}