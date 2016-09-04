<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers11;
use League\Fractal\TransformerAbstract;

class Answers11Controller extends BaseController
{

    protected function getModelName(){
        return 'Answers11';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers11();
    }
}
