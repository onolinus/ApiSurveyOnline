<?php

namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\TotalBelanjaJenisPengeluaran;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TotalBelanjaJenisPengeluaranController extends ReportController
{
    protected function getFromDb()
    {
        $data = DB::table('total_belanja_per_jenis_pengeluaran')->first();
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
        return 'Distribusi Total Belanja Litbang menurut Jenis Pengeluaran';
    }

    protected function getTransformer()
    {
        return new TotalBelanjaJenisPengeluaran();
    }

    protected function returnType()
    {
        return 'item';
    }

    protected function getCacheName()
    {
        return 'report:totalbelanja:jenispengeluaran';
    }
}
