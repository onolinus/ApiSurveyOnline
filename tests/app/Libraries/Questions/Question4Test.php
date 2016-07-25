<?php

namespace tests\app\Libraries\Questions;

use app\Libraries\Questions\Question4;

class Question4Test extends \PHPUnit_Framework_TestCase{

    public function test_isValidAnswer_return_true(){
        $belanja_pegawai = ['gaji_upah_honor_proyek' => 100];
        $belanja_modal = ['tanah_gedung_bangunan' => 100, 'kendaraan_mesin_peralatan' => 100];
        $belanja_operasional = ['pemeliharaan_perbaikan' => 100];
        $Question4 = new Question4($belanja_pegawai, $belanja_modal, $belanja_operasional);
        $this->assertTrue($Question4->isValidAnswer());
        $this->assertEquals([
            'belanja_pegawai' => $belanja_pegawai,
            'belanja_modal' => $belanja_modal,
            'belanja_operasional' => $belanja_operasional,
        ], $Question4->getValidatedAnswer());
    }

    public function test_isValidAnswer_where_all_belanja_is_null(){
        $Question4 = new Question4();
        $this->assertFalse($Question4->isValidAnswer());
        $this->assertEquals('Kolom Gaji Upah + honor proyek harus diisi.', $Question4->getErrors()['belanja_pegawai.gaji_upah_honor_proyek']);
        $this->assertEquals('Kolom Tanah, gedung dan bangunan lainnya harus diisi.', $Question4->getErrors()['belanja_modal.tanah_gedung_bangunan']);
        $this->assertEquals('Kolom Kendaraan, mesin, dan peralatan harus diisi.', $Question4->getErrors()['belanja_modal.kendaraan_mesin_peralatan']);
        $this->assertEquals('Kolom Barang habis pakai harus diisi.', $Question4->getErrors()['belanja_operasional.pemeliharaan_perbaikan']);

    }

    public function test_value_is_not_numeric(){
        $belanja_pegawai = ['gaji_upah_honor_proyek' => 'gaji_upah_honor_proyek'];
        $belanja_modal = ['tanah_gedung_bangunan' => 100, 'kendaraan_mesin_peralatan' => 'kendaraan_mesin_peralatan'];
        $belanja_operasional = ['pemeliharaan_perbaikan' => 100];
        $Question4 = new Question4($belanja_pegawai, $belanja_modal, $belanja_operasional);
        $this->assertFalse($Question4->isValidAnswer());
        $this->assertEquals('Kolom Gaji Upah + honor proyek harus berisi angka.', $Question4->getErrors()['belanja_pegawai.gaji_upah_honor_proyek']);
        $this->assertEquals('Kolom Kendaraan, mesin, dan peralatan harus berisi angka.', $Question4->getErrors()['belanja_modal.kendaraan_mesin_peralatan']);
    }

    public function test_value_is_null_then_get_error_required(){
        $belanja_pegawai = ['gaji_upah_honor_proyek' => null];
        $belanja_modal = ['tanah_gedung_bangunan' => 100, 'kendaraan_mesin_peralatan' => null];
        $belanja_operasional = ['pemeliharaan_perbaikan' => 100];
        $Question4 = new Question4($belanja_pegawai, $belanja_modal, $belanja_operasional);
        $this->assertFalse($Question4->isValidAnswer());
        $this->assertEquals('Kolom Gaji Upah + honor proyek harus diisi.', $Question4->getErrors()['belanja_pegawai.gaji_upah_honor_proyek']);
        $this->assertEquals('Kolom Kendaraan, mesin, dan peralatan harus diisi.', $Question4->getErrors()['belanja_modal.kendaraan_mesin_peralatan']);
    }
}