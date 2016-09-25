<?php

namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\TotalBelanjaLembaga;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TotalBelanjaLembagaController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('lembaga')
            ->select('lembaga.*', DB::raw('SUM(answers1.total) as total'))
            ->leftjoin('approved_by', 'approved_by.id_lembaga', '=', 'lembaga.id')
            ->leftjoin('answers', 'answers.id_correspondent', '=', 'approved_by.correspondent_id_approved')
            ->leftjoin('answers1', 'answers1.id_answer', '=', 'answers.id')
            ->groupBy('lembaga.id')
            ->get();
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
