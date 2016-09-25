<?php
namespace App\Http\Controllers\Guest\Report;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CorrespondentPrivilegeMiddleware;
use App\Transformer\Report\CountUserLembaga;
use EllipseSynergie\ApiResponse\Laravel\Response;
use Illuminate\Support\Facades\DB;

class CountUserLembagaController extends Controller
{
    public function index(Response $response)
    {
        $result = $result = DB::table('lembaga')
            ->select('lembaga.*', DB::raw('COUNT(users.id) as count'))
            ->leftjoin('approved_by', 'approved_by.id_lembaga', '=', 'lembaga.id')
            ->leftjoin('correspondents', 'correspondents.user_id', '=', 'approved_by.correspondent_id_approved')
            ->leftjoin('users', function($join){
                $join->on('users.id', '=', 'correspondents.user_id')
                    ->where('users.type', '=', CorrespondentPrivilegeMiddleware::USER_TYPE_ALLOWED);
            })
            ->groupBy('lembaga.id')
            ->get();

        return $response->withCollection(collect($result), new CountUserLembaga());
    }
}
