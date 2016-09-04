<?php
namespace App\Http\Controllers\Survey;

use App\Http\Requests;
use App\Transformer\Answers1 as Answers1Transformer;

class Answers1Controller extends BaseController
{

    protected function getModelName(){
        return 'Answers1';
    }

    protected function getTransformers(){
        return new Answers1Transformer();
    }
}
