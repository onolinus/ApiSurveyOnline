<?php

namespace App\Http\Controllers;

use App\Transformer\Lembaga;
use App\TraitFractalResponse;
use App\Http\Requests;

use App\Lembaga as LembagaModel;

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
        $lembaga = LembagaModel::with('usersCount')->get();

        return $this->response->withCollection($lembaga, $this->getTransformer(), null, null);
    }
}
