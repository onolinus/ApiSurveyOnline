<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers8;
use League\Fractal\TransformerAbstract;

class Answers8Controller extends BaseController
{

    protected function getModelName(){
        return 'Answers8';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers8();
    }
}
