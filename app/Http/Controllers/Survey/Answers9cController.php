<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers9c;
use League\Fractal\TransformerAbstract;

class Answers9cController extends BaseController
{

    protected function getModelName(){
        return 'Answers9c';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers9c();
    }
}
