<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers3;
use League\Fractal\TransformerAbstract;

class Answers3Controller extends BaseController
{

    protected function getModelName(){
        return 'Answers3';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers3();
    }
}
