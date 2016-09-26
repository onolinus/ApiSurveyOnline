<?php

namespace App\Http\Controllers\Guest\Report;

use App\Http\Requests;
use App\Transformer\Report\TotalBelanjaJenisPengeluaranLembaga;
use Illuminate\Support\Facades\DB;

class TotalBelanjaJenisPengeluaranLembagaController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('lembaga')
            ->select('lembaga.*', (DB::raw('SUM(answers4.belanja_pegawai_upah)/SUM(answers2.jumlah)
            *100 AS `percentage_belanja_pegawai_upah`,
            SUM(answers4.belanja_pegawai_upah) AS `belanja_pegawai_upah`,
             SUM(answers4.belanja_modal_properti)/SUM(answers2.jumlah)
             *100 AS `percentage_belanja_modal_properti`,
             SUM(answers4.belanja_modal_properti) AS `belanja_modal_properti`,
              SUM(answers4.belanja_modal_mesin)/SUM(answers2.jumlah)
              *100 AS `percentage_belanja_modal_mesin`,
              SUM(answers4.belanja_modal_mesin) AS `belanja_modal_mesin`,
               SUM(answers4.belanja_operasional_maintenance)/SUM(answers2.jumlah)
               *100 AS `percentage_belanja_operasional_maintenance`,
               SUM(answers4.belanja_operasional_maintenance) AS `belanja_operasional_maintenance`,
               SUM(answers2.jumlah)/jumlahbelanja()*100 AS `percentage_total_per_lembaga`,
               SUM(answers2.jumlah) AS `total_per_lembaga`,
               jumlahbelanja() AS `total`')))
            ->leftjoin('approved_by', 'approved_by.id_lembaga', '=', 'lembaga.id')
            ->leftjoin('answers', 'answers.id_correspondent', '=', 'approved_by.correspondent_id_approved')
            ->leftjoin('answers4', 'answers4.id_answer', '=', 'answers.id')
            ->leftjoin('answers2', 'answers2.id_answer', '=', 'answers.id')
            ->groupBy('lembaga.id')
            ->get();
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
