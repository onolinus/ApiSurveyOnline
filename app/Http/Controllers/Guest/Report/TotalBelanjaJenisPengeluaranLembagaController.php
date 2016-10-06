<?php

namespace App\Http\Controllers\Guest\Report;

use App\Http\Requests;
use App\Transformer\Report\TotalBelanjaJenisPengeluaranLembaga;
use Illuminate\Support\Facades\DB;

class TotalBelanjaJenisPengeluaranLembagaController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('total_belanja_per_jenis_pengeluaran_per_lembaga')->get();
    }

    protected function getMeta(){
        return [
            'title' => $this->getTitle(),
//            'total' => doubleval($this->data->total)
        ];
    }

    protected function getTitle()
    {
        return 'Jenis Pengeluaran Belanja Litbang menurut Lembaga';
    }

    protected function getTransformer()
    {
        return new TotalBelanjaJenisPengeluaranLembaga();
    }

    protected function returnType()
    {
        return 'collection';
    }

    protected function getCacheName()
    {
        return 'report:totalbelanja:jenispengeluaran:lembaga';
    }
}
