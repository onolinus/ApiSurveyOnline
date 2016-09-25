<?php

namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\TotalBelanjaJenisPengeluaran;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TotalBelanjaJenisPengeluaranController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('answers4')
            ->select((DB::raw('SUM(answers4.belanja_pegawai_upah)/SUM(answers2.jumlah)*100 AS `percentage_belanja_pegawai_upah`,
            SUM(answers4.belanja_pegawai_upah) AS `belanja_pegawai_upah`,
             SUM(answers4.belanja_modal_properti)/SUM(answers2.jumlah)*100 AS `percentage_belanja_modal_properti`,
             SUM(answers4.belanja_modal_properti) AS `belanja_modal_properti`,
              SUM(answers4.belanja_modal_mesin)/SUM(answers2.jumlah)*100 AS `percentage_belanja_modal_mesin`,
              SUM(answers4.belanja_modal_mesin) AS `belanja_modal_mesin`,
               SUM(answers4.belanja_operasional_maintenance)/SUM(answers2.jumlah)*100 AS `percentage_belanja_operasional_maintenance`,
               SUM(answers4.belanja_operasional_maintenance) AS `belanja_operasional_maintenance`,
               SUM(answers2.jumlah) AS `total`')))
            ->leftjoin('answers2', 'answers2.id_answer', '=', 'answers4.id_answer')
            ->first();
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
