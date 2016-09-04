<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers18;
use League\Fractal\TransformerAbstract;

class Answers18Controller extends BaseController
{

    protected function getModelName(){
        return 'Answers18';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers18();
    }
}
