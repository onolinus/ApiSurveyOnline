<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers9b;
use League\Fractal\TransformerAbstract;

class Answers9bController extends BaseController
{

    protected function getModelName(){
        return 'Answers9b';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers9b();
    }
}
