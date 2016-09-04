<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers2;
use League\Fractal\TransformerAbstract;

class Answers2Controller extends BaseController
{

    protected function getModelName(){
        return 'Answers2';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers2();
    }
}
