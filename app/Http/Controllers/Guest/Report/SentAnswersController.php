<?php
namespace App\Http\Controllers\Guest\Report;

use App\Transformer\Report\SentAnswersLembaga;
use Illuminate\Support\Facades\DB;

class SentAnswersController extends ReportController
{
    protected function getFromDb()
    {
        return DB::table('sent_answers')->get();
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
