<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers14;
use League\Fractal\TransformerAbstract;

class Answers14Controller extends BaseController
{

    protected function getModelName(){
        return 'Answers14';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers14();
    }
}
