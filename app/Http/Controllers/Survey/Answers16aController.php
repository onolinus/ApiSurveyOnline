<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers16a;
use League\Fractal\TransformerAbstract;

class Answers16aController extends BaseController
{

    protected function getModelName(){
        return 'Answers16a';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers16a();
    }
}
