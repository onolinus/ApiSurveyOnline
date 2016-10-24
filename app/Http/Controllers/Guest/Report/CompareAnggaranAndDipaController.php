<?php
namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\CompareAnggaranAndDipa;
use Illuminate\Support\Facades\DB;

class CompareAnggaranAndDipaController extends ReportController
{
    protected function getFromDb()
    {
        $data = DB::table('compare_total_realisasi_anggaran_and_total_dipa')->get();
        return $data;
    }

    protected function getMeta(){
        return [
            'title' => $this->getTitle()
        ];
    }

    protected function getTitle()
    {
        return 'Perbandingan belanja litbang DIPA terhadap realisasi anggaran DIPA per lembaga';
    }

    protected function getTransformer()
    {
        return new CompareAnggaranAndDipa();
    }

    protected function returnType()
    {
        return 'collection';
    }

    protected function getCacheName()
    {
        return 'report:compare:totalanggaran:totaldipa';
    }
}
