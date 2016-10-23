<?php

namespace App\Http\Controllers\Guest\Report;

use App\Http\Requests;
use App\Transformer\Report\TotalBelanjaJenisSumberDana;
use Illuminate\Support\Facades\DB;

class TotalBelanjaJenisSumberDanaController extends ReportController
{
    protected function getFromDb()
    {
        return [
            'dipa' => DB::table('total_dipa')->first(),
            'nondipa' => DB::table('total_nondipa')->first(),
            'compare' => DB::table('compare_total_dipa_nondipa')->first(),
        ];
    }

    protected function getTitle()
    {
        return 'Total Belanja Litbang Sektor Pemerintah menurut Sumber Pendanaan';
    }

    protected function getTransformer()
    {
        return new TotalBelanjaJenisSumberDana();
    }

    protected function returnType()
    {
        return 'item';
    }

    protected function getCacheName()
    {
        return 'report:totalbelanja:jenissumberdana';
    }
}
