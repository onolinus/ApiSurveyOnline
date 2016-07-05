<?php

namespace tests\app\Helper;

use \app\Helper\Number;


class NumberTest extends \PHPUnit_Framework_TestCase{

    public function test_(){
        $this->assertEquals('I', Number\simple_romanic_number(1));
        $this->assertEquals('II', Number\simple_romanic_number(2));
        $this->assertEquals('III', Number\simple_romanic_number(3));
        $this->assertEquals('IV', Number\simple_romanic_number(4));
        $this->assertEquals('V', Number\simple_romanic_number(5));
    }

}