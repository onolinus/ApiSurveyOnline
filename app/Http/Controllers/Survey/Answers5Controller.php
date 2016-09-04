<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers5;
use League\Fractal\TransformerAbstract;

class Answers5Controller extends BaseController
{

    protected function getModelName(){
        return 'Answers5';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers5();
    }
}
