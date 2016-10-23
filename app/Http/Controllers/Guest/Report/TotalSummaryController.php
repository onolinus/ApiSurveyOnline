<?php
namespace App\Http\Controllers\Guest\Report;

use App\Answers;
use App\Correspondents;
use App\Lembaga;
use App\Transformer\Report\TotalSummary;

class TotalSummaryController extends ReportController
{
    protected function getFromDb()
    {
        return [
            'lembaga' => Lembaga::count(),
            'correspondent' => Correspondents::count(),
            'answers' => Answers::count(),
        ];
    }

    protected function getCacheName()
    {
        return 'report:summary:total';
    }

    protected function getTitle()
    {
        return 'Total Summary';
    }

    protected function getTransformer()
    {
        return new TotalSummary();
    }

    protected function returnType()
    {
        return 'item';
    }
}
