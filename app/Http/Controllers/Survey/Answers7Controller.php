<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers7;
use League\Fractal\TransformerAbstract;

class Answers7Controller extends BaseController
{

    protected function getModelName(){
        return 'Answers7';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers7();
    }
}
