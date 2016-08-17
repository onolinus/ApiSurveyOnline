<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Transformer\ApprovedByTransformer;
use App\Http\Requests;
use App\Transformer\ApprovedsByTransformer;

class ApprovedByController extends BaseController
{
    protected function getModelName()
    {
        return 'ApprovedBy';
    }

    protected function getModelLabel()
    {
        return 'approved by';
    }

    /**
     * @return \League\Fractal\TransformerAbstract
     */
    protected function getTransformer()
    {
        return new ApprovedByTransformer();
    }

    protected function getListTransformer(){
        return new ApprovedsByTransformer();
    }

    protected function usePaginationByDefault(){
        return true;
    }
}
