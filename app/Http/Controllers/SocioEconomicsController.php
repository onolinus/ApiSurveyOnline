<?php

namespace App\Http\Controllers;

use App\Transformer\SocioEconomicsTransformer;

use App\Http\Requests;

class SocioEconomicsController extends BaseController
{
    protected function getModelName()
    {
        return 'SocioEconomics';
    }

    protected function getModelLabel()
    {
        return 'socio economics';
    }

    /**
     * @return \League\Fractal\TransformerAbstract
     */
    protected function getTransformer()
    {
        return new SocioEconomicsTransformer;
    }

    protected function usePaginationByDefault(){
        return false;
    }
}
