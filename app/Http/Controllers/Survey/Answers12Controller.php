<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers12;
use League\Fractal\TransformerAbstract;

class Answers12Controller extends BaseController
{

    protected function getModelName(){
        return 'Answers11';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers12();
    }
}
