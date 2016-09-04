<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers4;
use League\Fractal\TransformerAbstract;

class Answers4Controller extends BaseController
{

    protected function getModelName(){
        return 'Answers4';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers4();
    }
}
