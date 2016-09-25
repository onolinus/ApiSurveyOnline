<?php
namespace App\Http\Controllers\Guest\Report;

use App\Http\Middleware\CorrespondentPrivilegeMiddleware;
use App\Transformer\Report\CountUserLembaga;
use Illuminate\Support\Facades\DB;

class CountUserLembagaController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('lembaga')
            ->select('lembaga.*', DB::raw('COUNT(users.id) as count'))
            ->leftjoin('approved_by', 'approved_by.id_lembaga', '=', 'lembaga.id')
            ->leftjoin('correspondents', 'correspondents.user_id', '=', 'approved_by.correspondent_id_approved')
            ->leftjoin('users', function($join){
                $join->on('users.id', '=', 'correspondents.user_id')
                    ->where('users.type', '=', CorrespondentPrivilegeMiddleware::USER_TYPE_ALLOWED);
            })
            ->groupBy('lembaga.id')
            ->get();
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
