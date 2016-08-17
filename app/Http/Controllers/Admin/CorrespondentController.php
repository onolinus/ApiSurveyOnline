<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Transformer\CorrespondentsTransformer;
use App\Transformer\CorrespondentTransformer;
use App\Http\Requests;

class CorrespondentController extends BaseController
{
    protected function getModelName()
    {
        return 'Correspondents';
    }

    protected function getModelLabel()
    {
        return 'respondent';
    }

    /**
     * @return \League\Fractal\TransformerAbstract
     */
    protected function getTransformer()
    {
        return new CorrespondentTransformer();
    }

    protected function getListTransformer(){
        return new CorrespondentsTransformer();
    }

    protected function usePaginationByDefault(){
        return true;
    }
}
