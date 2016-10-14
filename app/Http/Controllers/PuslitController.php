<?php

namespace App\Http\Controllers;

use App\Transformer\Puslit;
use EllipseSynergie\ApiResponse\Laravel\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PuslitController extends Controller
{
//    const LIMIT = 10;

    public function index(Response $response, Request $request)
    {
//        $page = $request->input('page');
//        $skip = (intval($page) < 1 ? 1 : intval($page)) * self::LIMIT;

        $result = DB::table('approved_by')
            ->select('approved_by.puslit', 'lembaga.*')
            ->join('lembaga', 'approved_by.id_lembaga', '=', 'lembaga.id')->groupBy('approved_by.puslit')->get(); //->skip($skip)->take(self::LIMIT)->get();


        return $response->withCollection(collect($result), new Puslit(), null, null, [
            'total' => count($result)
        ]);
    }

    public function lembaga(Response $response, $idLembaga)
    {
        $result = DB::table('approved_by')
            ->select('approved_by.puslit', 'lembaga.*')
            ->join('lembaga', 'approved_by.id_lembaga', '=', 'lembaga.id')
            ->where('lembaga.id', '=', $idLembaga)->groupBy('approved_by.puslit')->get();


        return $response->withCollection(collect($result), new Puslit(), null, null, [
            'total' => count($result)
        ]);
    }
}
