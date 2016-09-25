<?php

namespace App\Http\Controllers\Guest\Report;

use App\Http\Controllers\Controller;
use App\Transformer\Report\TotalBelanjaLembaga;
use EllipseSynergie\ApiResponse\Laravel\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class TotalBelanjaLembagaController extends Controller
{
    public function index(Response $response)
    {
        $result = $result = DB::table('lembaga')
            ->select('lembaga.*', DB::raw('SUM(answers1.total) as total'))
            ->leftjoin('approved_by', 'approved_by.id_lembaga', '=', 'lembaga.id')
            ->leftjoin('answers', 'answers.id_correspondent', '=', 'approved_by.correspondent_id_approved')
            ->leftjoin('answers1', 'answers1.id_answer', '=', 'answers.id')
            ->groupBy('lembaga.id')
            ->get();

        $result = collect($result);

        return $response->withCollection($result, new TotalBelanjaLembaga());
    }
}
