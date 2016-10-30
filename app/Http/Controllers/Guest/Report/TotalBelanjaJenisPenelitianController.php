<?php

namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\TotalBelanjaJenisPenelitian;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TotalBelanjaJenisPenelitianController extends ReportController
{
    protected function getFromDb()
    {
        $data = DB::table('total_belanja_per_jenis_penelitian')->first();
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
        return 'Total Belanja Litbang menurut Jenis Penelitian';
    }

    protected function getTransformer()
    {
        return new TotalBelanjaJenisPenelitian();
    }

    protected function returnType()
    {
        return 'item';
    }

    protected function getCacheName()
    {
        return 'report:totalbelanja:jenispenelitian';
    }
}
