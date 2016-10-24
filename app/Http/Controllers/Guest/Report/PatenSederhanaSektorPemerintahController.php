<?php
namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\PatenSederhanaSektorPemerintah;
use Illuminate\Support\Facades\DB;

class PatenSederhanaSektorPemerintahController extends ReportController
{
    protected function getFromDb()
    {
        $data = DB::table('paten_sederhana_sektor_pemerintah')->first();
        return $data;
    }

    protected function getMeta(){
        return [
            'title' => $this->getTitle(),
            'total' => doubleval($this->data->total)
        ];
    }

    protected function getTitle()
    {
        return 'Perkembangan Paten Sederhana Sektor Pemerintah Tahun 2015-2013';
    }

    protected function getTransformer()
    {
        return new PatenSederhanaSektorPemerintah();
    }

    protected function returnType()
    {
        return 'item';
    }

    protected function getCacheName()
    {
        return 'report:patensederhana:pemerintah';
    }
}
