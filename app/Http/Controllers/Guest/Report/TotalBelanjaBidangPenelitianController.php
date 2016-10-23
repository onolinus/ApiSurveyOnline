<?php

namespace App\Http\Controllers\Guest\Report;

use App\Http\Requests;
use App\Transformer\Report\TotalBelanjaBidangPenelitian;
use Illuminate\Support\Facades\DB;

class TotalBelanjaBidangPenelitianController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('total_belanja_per_bidang_penelitian')->get();
    }

    protected function getMeta(){
        return [
            'title' => $this->getTitle(),
        ];
    }

    protected function getTitle()
    {
        return 'Total Belanja Litbang menurut Bidang Penelitian';
    }

    protected function getTransformer()
    {
        return new TotalBelanjaBidangPenelitian();
    }

    protected function returnType()
    {
        return 'collection';
    }

    protected function getCacheName()
    {
        return 'report:totalbelanja:bidangpenelitian';
    }
}
