<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers9a;
use League\Fractal\TransformerAbstract;

class Answers9aController extends BaseController
{

    protected function getModelName(){
        return 'Answers9a';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers9a();
    }
}
