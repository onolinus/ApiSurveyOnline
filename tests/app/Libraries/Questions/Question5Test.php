<?php

namespace tests\app\Libraries\Questions;

use app\Libraries\Questions\Question5;

class Question5Test extends \TestCase
{

    public function test_isValidAnswer_return_true()
    {
        $Question5 = new Question5();
        $Question5->setPersentaseDana('A', 50)->setPersentaseDana('B', 30)->setPersentaseDana('C', 20);
        $this->assertTrue($Question5->isValidAnswer());
        $this->assertEquals(array (
            'dana' =>
                array (
                    'A' => 50,
                    'B' => 30,
                    'C' => 20,
                ),
            'count_dana' => 3,
            'total_percentage' => 100,
        ), $Question5->getValidatedAnswer());
    }

    public function test_isValidAnswer_where_all_dana_is_null_then_return_error_count_dana(){
        $Question5 = new Question5();
        $this->assertFalse($Question5->isValidAnswer());
        $this->assertEquals('The count dana must be at least 1.', $Question5->getErrors()[0]);
    }

    public function test_isValidAnswer_where_total_percentage_size_is_not_100()
    {
        $Question5 = new Question5();
        $Question5->setPersentaseDana('A', 50)->setPersentaseDana('B', 30)->setPersentaseDana('C', 10);
        $this->assertFalse($Question5->isValidAnswer());
        $this->assertEquals('The total percentage must be 100.', $Question5->getErrors()[0]);
    }

    public function test_isValidAnswer_where_dana_is_null()
    {
        $Question5 = new Question5();
        $Question5->setPersentaseDana('A', null)->setPersentaseDana('B', 30)->setPersentaseDana('C', 10);
        $this->assertFalse($Question5->isValidAnswer());
        $this->assertEquals('The dana. a field is required.', $Question5->getErrors()[0]);
        $this->assertEquals('The total percentage must be 100.', $Question5->getErrors()[1]);
    }

    public function test_isValidAnswer_where_dana_is_noy_numeric()
    {
        $Question5 = new Question5();
        $Question5->setPersentaseDana('A', 'A')->setPersentaseDana('B', 30)->setPersentaseDana('C', 10);
        $this->assertFalse($Question5->isValidAnswer());
        $this->assertEquals('The dana. a must be a number.', $Question5->getErrors()[0]);
        $this->assertEquals('The total percentage must be 100.', $Question5->getErrors()[1]);
    }
}