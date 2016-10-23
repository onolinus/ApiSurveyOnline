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
}
