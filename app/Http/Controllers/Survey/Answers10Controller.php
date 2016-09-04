<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers10;
use League\Fractal\TransformerAbstract;

class Answers10Controller extends BaseController
{

    protected function getModelName(){
        return 'Answers10';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers10();
    }
}
