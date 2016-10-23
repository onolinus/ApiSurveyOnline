<?php

namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\TotalBelanjaLembaga;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TotalBelanjaLembagaController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('total_belanja_per_lembaga')->get();
    }

    protected function getCacheName()
    {
        return 'report:lembaga:totalbelanja';
    }

    protected function getTitle()
    {
        return 'Total Belanja Litbang Sektor Pemerintah menurut Lembaga Pelaksana (Milyar)';
    }

    protected function getTransformer()
    {
        return new TotalBelanjaLembaga();
    }

    protected function returnType()
    {
        return 'collection';
    }
}
