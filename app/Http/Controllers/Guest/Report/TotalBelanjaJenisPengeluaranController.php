<?php

namespace App\Http\Controllers\Guest\Report;

use App\Http\Controllers\Controller;
use App\Transformer\Report\TotalBelanjaJenisPengeluaran;
use EllipseSynergie\ApiResponse\Laravel\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TotalBelanjaJenisPengeluaranController extends Controller
{
    public function index(Response $response)
    {
        $result = $result = DB::table('answers4')
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

        return $response->withItem(collect($result), new TotalBelanjaJenisPengeluaran(), null, [
            'title' => 'Distribusi Total Belanja Litbang menurut Jenis Pengeluaran',
            'total' => doubleval($result->total)
        ]);
    }
}
