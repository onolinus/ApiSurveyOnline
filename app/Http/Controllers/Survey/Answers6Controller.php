<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers6;
use League\Fractal\TransformerAbstract;

class Answers6Controller extends BaseController
{

    protected function getModelName(){
        return 'Answers6';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers6();
    }
}
