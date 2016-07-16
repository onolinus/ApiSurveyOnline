<?php

namespace App\Http\Controllers;

use App\Transformer\Questions;

use App\Http\Requests;

class QuestionsController extends BaseController
{
    //
    protected function getModelName()
    {
        return 'Questions';
    }

    protected function getModelLabel()
    {
        return 'question';
    }

    /**
     * @return \League\Fractal\TransformerAbstract
     */
    protected function getTransformer()
    {
        return new Questions;
    }

    protected function usePaginationByDefault(){
        return false;
    }
}
