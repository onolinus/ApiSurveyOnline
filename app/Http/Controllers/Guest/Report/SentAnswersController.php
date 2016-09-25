<?php
namespace App\Http\Controllers\Guest\Report;


use App\Http\Controllers\Controller;
use App\Http\Middleware\CorrespondentPrivilegeMiddleware;
use App\Transformer\Report\SentAnswersLembaga;
use EllipseSynergie\ApiResponse\Laravel\Response;
use Illuminate\Support\Facades\DB;

class SentAnswersController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('lembaga')
            ->select('lembaga.*', DB::raw('COUNT(answers.id) as count'))
            ->leftjoin('approved_by', 'approved_by.id_lembaga', '=', 'lembaga.id')
            ->leftjoin('correspondents', 'correspondents.user_id', '=', 'approved_by.correspondent_id_approved')
            ->leftjoin('users', function($join){
                $join->on('users.id', '=', 'correspondents.user_id')
                    ->where('users.type', '=', CorrespondentPrivilegeMiddleware::USER_TYPE_ALLOWED);
            })
            ->leftjoin('answers', 'answers.id_correspondent', '=', 'correspondents.user_id')
            ->groupBy('lembaga.id')
            ->get();
    }

    protected function getCacheName()
    {
        return 'report:lembaga:surveysent';
    }

    protected function getTitle()
    {
        return 'Jumlah respondent yang mengirimkan survey';
    }

    protected function getTransformer()
    {
        return new SentAnswersLembaga();
    }

    protected function returnType()
    {
        return 'collection';
    }
}
