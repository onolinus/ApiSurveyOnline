<?php

namespace App\Http\Controllers;

use App\Transformer\Lembaga;

use App\Http\Requests;

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
