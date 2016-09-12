<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CorrespondentPrivilegeMiddleware;
use App\Transformer\Lembaga;
use App\TraitFractalResponse;
use App\Http\Requests;

use App\Lembaga as LembagaModel;
use Illuminate\Support\Facades\DB;

class LembagaController extends BaseController
{
    protected function getModelName()
    {
        return 'Lembaga';
    }

    protected function getModelLabel()
    {
        return 'lembaga';
    }

    /**
     * @return \League\Fractal\TransformerAbstract
     */
    protected function getTransformer()
    {
        return new Lembaga;
    }

    protected function usePaginationByDefault(){
        return false;
    }

    public function getUserCount()
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

        return $this->response->withArray(['data' => $result]);

//        $lembaga = LembagaModel::with('usersCount')->get();

//        return $this->response->withCollection($lembaga, $this->getTransformer(), null, null);
    }
}
