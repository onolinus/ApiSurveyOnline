<?php
namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\ProdukBarang;
use Illuminate\Support\Facades\DB;

class ProdukBarangController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('produk_barang')->get();
    }

    protected function getCacheName()
    {
        return 'report:produk:barang';
    }

    protected function getTitle()
    {
        return 'Perkembangan Jumlah produk barang tahun 2013-2015 (perbandingan yang sudah dan belum terkomersialisasi';
    }

    protected function getTransformer()
    {
        return new ProdukBarang();
    }

    protected function returnType()
    {
        return 'item';
    }
}
