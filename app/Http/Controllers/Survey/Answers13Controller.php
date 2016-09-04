<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers13;
use League\Fractal\TransformerAbstract;

class Answers13Controller extends BaseController
{

    protected function getModelName(){
        return 'Answers13';
    }

    /**
     * @return TransformerAbstract
     */
    protected function getTransformers()
    {
        return new Answers13();
    }
}
