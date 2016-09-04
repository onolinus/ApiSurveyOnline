<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers15a;
use League\Fractal\TransformerAbstract;

class Answers15aController extends BaseController
{

    protected function getModelName(){
        return 'Answers15a';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers15a();
    }
}
