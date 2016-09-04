<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers17;
use League\Fractal\TransformerAbstract;

class Answers17Controller extends BaseController
{

    protected function getModelName(){
        return 'Answers17';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers17();
    }
}
