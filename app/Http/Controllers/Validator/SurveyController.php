<?php
namespace App\Http\Controllers\Validator;

use App\Http\Controllers\Controller;
use app\Libraries\Survey;
use app\Libraries\SurveyTrafficBalancer;
use App\TraitCacheSurveyData;
use App\TraitFractalResponse;
use App\Http\Requests;
use App\Transformer\Answers as AnswersTransformer;

class SurveyController extends Controller
{
    use TraitFractalResponse;

    use TraitCacheSurveyData;


    public function index(){
        $surveyTrafficBalancer = new SurveyTrafficBalancer();
        $answers = $surveyTrafficBalancer->getValidatorAnswers();
        return $this->response->withCollection($answers, new AnswersTransformer());
    }

    public function random(){
        $surveyTrafficBalancer = new SurveyTrafficBalancer();
        $answer = $surveyTrafficBalancer->getAnswerTobeValidated();

        if($answer === null){
            return $this->response->errorNotFound([trans('validator.nodatatobevalidated')]);
        }

        return $this->response->withItem($answer, new AnswersTransformer());
    }

    public function show($id){
        $survey = new Survey();
        $data = $survey->getListAnswers($id);

        if(is_null($data)){
            return $this->response->errorNotFound([trans('errors.data_not_found', ['dataname' => 'user'])]);
        }

        return $this->response->withArray($data);
    }
}
