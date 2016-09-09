<?php
namespace App\Http\Controllers\Guest\Report;


use App\Answers;
use App\Correspondents;
use App\Http\Controllers\Controller;
use App\Lembaga;
use EllipseSynergie\ApiResponse\Laravel\Response;

class TotalSummaryController extends Controller
{
    public function index(Response $response){
        return $response->withArray([
            'data' => [
                'lembaga' => Lembaga::count(),
                'correspondent' => Correspondents::count(),
                'answers' => Answers::count(),
            ]
        ]);
    }
}
