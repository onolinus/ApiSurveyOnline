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
        $result = $result = DB::table('users')
            ->select('lembaga.*', DB::raw('COUNT(1) as count'))
            ->join('correspondents', 'correspondents.user_id', '=', 'users.id')
            ->join('approved_by', 'approved_by.correspondent_id_approved', '=', 'correspondents.user_id')
            ->join('lembaga', 'lembaga.id', '=', 'approved_by.id_lembaga')
            ->where('users.type', CorrespondentPrivilegeMiddleware::USER_TYPE_ALLOWED)
            ->groupBy('approved_by.id_lembaga')
            ->get();

        return $this->response->withArray(['data' => $result]);

//        $lembaga = LembagaModel::with('usersCount')->get();

//        return $this->response->withCollection($lembaga, $this->getTransformer(), null, null);
    }
}
