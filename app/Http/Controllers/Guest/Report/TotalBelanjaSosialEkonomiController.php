<?php

namespace App\Http\Controllers\Guest\Report;

use App\Http\Requests;
use App\Transformer\Report\TotalBelanjaSosialEkonomi;
use Illuminate\Support\Facades\DB;

class TotalBelanjaSosialEkonomiController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('total_belanja_per_sosial_ekonomi')->get();
    }

    protected function getMeta(){
        return [
            'title' => $this->getTitle(),
        ];
    }

    protected function getTitle()
    {
        return 'Tujuan Sosio Ekonomi Litbang Sektor Pemerintah';
    }

    protected function getTransformer()
    {
        return new TotalBelanjaSosialEkonomi();
    }

    protected function returnType()
    {
        return 'collection';
    }

    protected function getCacheName()
    {
        return 'report:totalbelanja:sosialekonomi';
    }
}
