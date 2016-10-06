<?php
namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\CountUserLembaga;
use Illuminate\Support\Facades\DB;

class CountUserLembagaController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('count_user_per_lembaga')->get();
    }

    protected function getCacheName()
    {
        return 'report:lembaga:count:correspondent';
    }

    protected function getTitle()
    {
        return 'Jumlah reponden per lembaga';
    }

    protected function getTransformer()
    {
        return new CountUserLembaga();
    }

    protected function returnType()
    {
        return 'collection';
    }
}
