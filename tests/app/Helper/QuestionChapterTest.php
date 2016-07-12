<?php

namespace tests\app\Helper;

use PluginCommonSurvey\Helper\Questions\Chapter;

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
        $this->assertEquals($this->chapters, Chapter\getChaptersData());
    }

    public function test_getChaptersData_when_parameter_chapter_number_is_not_null(){
        $this->assertEquals($this->chapters[1], Chapter\getChaptersData(1));
        $this->assertEquals($this->chapters[2], Chapter\getChaptersData(2));
        $this->assertEquals($this->chapters[3], Chapter\getChaptersData(3));
        $this->assertEquals($this->chapters[4], Chapter\getChaptersData(4));
        $this->assertEquals($this->chapters[5], Chapter\getChaptersData(5));
    }

    public function test_getChaptersData_when_parameter_chapter_number_is_not_exist(){
        $this->assertNull(Chapter\getChaptersData(6));
    }
}