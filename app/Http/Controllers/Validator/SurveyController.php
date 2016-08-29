<?php
namespace App\Http\Controllers\Validator;

use App\Http\Controllers\Controller;
use app\Libraries\Survey;
use App\TraitCacheSurveyData;
use App\TraitFractalResponse;
use App\Http\Requests;

class SurveyController extends Controller
{
    use TraitFractalResponse;

    use TraitCacheSurveyData;

    public function show($id){
        $survey = new Survey();

        return $this->response->withArray($survey->getListAnswers($id));
    }
}
