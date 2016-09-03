<?php
namespace App\Http\Controllers\Validator;

use App\Correspondents as CorrespondentsModel;
use App\Http\Controllers\Controller;
use app\Libraries\SurveyTrafficBalancer;
use App\TraitCacheSurveyData;
use App\TraitFractalResponse;
use App\Http\Requests;
use App\Transformer\AnswerDetail as AnswerDetailTransformer;
use App\Transformer\Answers as AnswersTransformer;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    use TraitFractalResponse;

    use TraitCacheSurveyData;


    public function index(Request $request){
        $surveyTrafficBalancer = new SurveyTrafficBalancer();
        $answers = $surveyTrafficBalancer->getValidatorAnswers($request->filter);
        return $this->response->withPaginator($answers, new AnswersTransformer());
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
        /** @var Correspondents $correspondent */
        $correspondent = CorrespondentsModel::find($id);

        if($correspondent === null){
            $this->response->errorNotFound([trans('validator.correspondentdatanotcompleted')]);
        }

        $answers = $correspondent->Answers;

        if($answers === null){
            return $this->response->errorNotFound([trans('validator.nousersurveydata')]);
        }

        return $this->response->withItem($answers, new AnswerDetailTransformer());
    }
}
