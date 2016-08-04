<?php

use Illuminate\Database\Seeder;

class LembagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('lembaga')->insert([
            [
                'name' => 'Lembaga Ilmu Pengetahuan Indonesia - LIPI',
                'type' => 'LPNK',
            ],
            [
                'name' => 'Badan Standarisasi Nasional - BSN',
                'type' => 'LPNK',
            ],
            [
                'name' => 'Badan Tenaga Nuklir Nasional - BATAN',
                'type' => 'LPNK',
            ],
            [
                'name' => 'Badan Pengkajian dan Penerapan Teknologi - BPPT',
                'type' => 'LPNK',
            ],
            [
                'name' => 'Lembaga Penerbangan dan Antariksa Nasional - LAPAN',
                'type' => 'LPNK',
            ],
            [
                'name' => 'Badan Meteorologi, Klimatologi dan Geofisika - BMKG',
                'type' => 'LPNK',
            ],
            [
                'name' => 'Badan Pengawas Obat dan Makanan - BPOM',
                'type' => 'LPNK',
            ],
            [
                'name' => 'Kementerian Riset, Teknologi dan Pendidikan Tinggi - Kemenristekdikti',
                'type' => 'LPK',
            ],
            [
                'name' => 'Kementerian Pertanian - Kementan',
                'type' => 'LPK',
            ],
            [
                'name' => 'Kementerian Kesehatan - Kemenkes',
                'type' => 'LPK',
            ],
            [
                'name' => 'Kementerian Lingkungan Hidup dan Kehutanan - Kemen LHK',
                'type' => 'LPK',
            ],
            [
                'name' => 'Kementerian Pekerjaan Umum dan Perumahan Rakyat - Kemen PUPR',
                'type' => 'LPK',
            ],
            [
                'name' => 'Kementerian Kelautan dan Perikanan - KKP',
                'type' => 'LPK',
            ],
            [
                'name' => 'Kementerian Energi dan Sumber Daya Mineral - Kemen ESDM',
                'type' => 'LPK',
            ],
            [
                'name' => 'Badan Informasi Geospasial - BIG',
                'type' => 'LPNK',
            ],
            [
                'name' => 'Kementerian Perindustrian - Kemenperin',
                'type' => 'LPK',
            ],
            [
                'name' => 'Kementerian Pertahanan - Kemenhan',
                'type' => 'LPK',
            ],
            [
                'name' => 'Kementerian Hukum dan Ham - Kumham',
                'type' => 'LPK',
            ],
        ]);
    }
}
