<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers15b;
use League\Fractal\TransformerAbstract;

class Answers15bController extends BaseController
{

    protected function getModelName(){
        return 'Answers15b';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers15b();
    }
}
