<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Transformer\RegistrasiToken;
use Illuminate\Http\Request;

use App\Http\Requests;

class RegistrasiTokenController extends BaseController
{
    //
    protected function getModelName()
    {
        return 'RegistrasiToken';
    }

    protected function getModelLabel()
    {
        return 'token';
    }

    /**
     * @return \League\Fractal\TransformerAbstract
     */
    protected function getTransformer()
    {
        return new RegistrasiToken();
    }

    protected function usePaginationByDefault(){
        return false;
    }
}
