<?php
namespace App\Http\Controllers\Guest\Report;


use App\Http\Controllers\Controller;
use App\Http\Middleware\CorrespondentPrivilegeMiddleware;
use EllipseSynergie\ApiResponse\Laravel\Response;
use Illuminate\Support\Facades\DB;

class SentAnswersController extends Controller
{
    public function index(Response $response){

//        $result = $result = DB::table('answers')
//            ->select('lembaga.*', DB::raw('COUNT(1) as count'))
//            ->join('correspondents', 'correspondents.user_id', '=', 'answers.id_correspondent')
//            ->join('approved_by', 'approved_by.correspondent_id_approved', '=', 'correspondents.user_id')
//            ->join('lembaga', 'lembaga.id', '=', 'approved_by.id_lembaga')
//            ->groupBy('approved_by.id_lembaga')
//            ->get();

        $result = $result = DB::table('lembaga')
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

        return $response->withArray(['data' => $result]);
    }
}
