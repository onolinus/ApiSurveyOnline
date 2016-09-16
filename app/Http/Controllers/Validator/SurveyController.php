<?php
namespace App\Http\Controllers\Validator;


use App\Answers;
use App\Http\Controllers\Controller;
use app\Libraries\SurveyTrafficBalancer;
use App\TraitCacheSurveyData;
use App\TraitFractalResponse;
use App\Http\Requests;
use App\Transformer\Answers as AnswersTransformer;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    use TraitFractalResponse;

    use TraitCacheSurveyData;

    /**
     * @var Answers
     */
    private $answers;


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

    public function show($user_id){
//        $this->answers = Answers::find($id);
//        $user_id = $this->answers->Correspondents->user_id;

        $response = $this->getValidatorDataSurveyFromCache($user_id);

        if($response === null){
            return $this->response->errorNotFound([trans('validator.nousersurveydata')]);
        }

        return $response;
    }
}
