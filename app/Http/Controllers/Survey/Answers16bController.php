<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers16b;
use League\Fractal\TransformerAbstract;

class Answers16bController extends BaseController
{

    protected function getModelName(){
        return 'Answers16b';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers16b();
    }
}
