<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Transformer\ResearchFieldsTransformer;

class ResearchFieldsController extends BaseController
{
    protected function getModelName()
    {
        return 'ResearchFields';
    }

    protected function getModelLabel()
    {
        return 'research fields';
    }

    /**
     * @return \League\Fractal\TransformerAbstract
     */
    protected function getTransformer()
    {
        return new ResearchFieldsTransformer();
    }

    protected function usePaginationByDefault(){
        return false;
    }
}
