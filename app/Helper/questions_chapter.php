<?php

namespace app\Helper\Questions\Chapter;

if (! function_exists('getChaptersData')) {
    function getChaptersData($chapter_number = null){
        $chapters = [
            '1' => 'Realisasi anggaran DIPA tahun 2015',
            '2' => 'Belanja Litbang tahun 2015',
            '3' => 'Personel Litbang tahun 2015',
            '4' => 'Keluaran Litbang dan Kinerja litbang',
            '5' => 'Tanggapan dan Saran',
        ];

        if($chapter_number === null){
            return $chapters;
        }


        return isset($chapters[$chapter_number]) ? $chapters[$chapter_number] : null;
    }
}