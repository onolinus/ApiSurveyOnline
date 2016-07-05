<?php

namespace tests\app\Helper;

use function app\Helper\Questions\Chapter\getChaptersData;

class QuestionChapterTest extends \PHPUnit_Framework_TestCase{

    private $chapters;

    public function setUp()
    {
        parent::setUp();
        $this->chapters = [
            '1' => 'Realisasi anggaran DIPA tahun 2015',
            '2' => 'Belanja Litbang tahun 2015',
            '3' => 'Personel Litbang tahun 2015',
            '4' => 'Keluaran Litbang dan Kinerja litbang',
            '5' => 'Tanggapan dan Saran',
        ];
    }

    public function test_getChaptersData_when_parameter_chapter_number_is_null(){
        $this->assertEquals($this->chapters, getChaptersData());
    }

    public function test_getChaptersData_when_parameter_chapter_number_is_not_null(){
        $this->assertEquals($this->chapters[1], getChaptersData(1));
        $this->assertEquals($this->chapters[2], getChaptersData(2));
        $this->assertEquals($this->chapters[3], getChaptersData(3));
        $this->assertEquals($this->chapters[4], getChaptersData(4));
        $this->assertEquals($this->chapters[5], getChaptersData(5));
    }

    public function test_getChaptersData_when_parameter_chapter_number_is_not_exist(){
        $this->assertNull(getChaptersData(6));
    }
}