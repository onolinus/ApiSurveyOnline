<?php
namespace App\Http\Controllers\Admin;

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
        $data = $survey->getListAnswers($id);

        if(is_null($data)){
            return $this->response->errorNotFound([trans('errors.data_not_found', ['dataname' => 'user'])]);
        }

        return $this->response->withArray($data);
    }
}
