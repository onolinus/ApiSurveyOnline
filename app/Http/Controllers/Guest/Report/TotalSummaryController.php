<?php
namespace App\Http\Controllers\Guest\Report;


use App\Answers;
use App\Correspondents;
use App\Http\Controllers\Controller;
use App\Lembaga;
use App\Transformer\Report\TotalSummary;
use EllipseSynergie\ApiResponse\Laravel\Response;

class TotalSummaryController extends Controller
{
    public function index(Response $response){
        return $response->withItem(collect([
                'lembaga' => Lembaga::count(),
                'correspondent' => Correspondents::count(),
                'answers' => Answers::count(),
            ]), new TotalSummary());
    }
}
