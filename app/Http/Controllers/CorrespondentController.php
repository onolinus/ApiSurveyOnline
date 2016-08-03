<?php
namespace App\Http\Controllers;

use App\AuthToken;
use App\Users as UsersModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
use Illuminate\Support\Facades\Validator;

class CorrespondentController extends Controller
{
    /**
     * @var Validator
     */
    private $validator;

    /**
     * @var Response
     */
    protected $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    private function runValidation($request, $rules){
        $this->validator = Validator::make($request->all(), $rules);
        if($this->validator->fails()){
            return false;
        }

        return true;
    }

    public function login(Request $request){
        if(!$this->runValidation($request, [
            'email' => 'required|max:50|email|exists:users,email',
            'password' => 'required|min:5',
        ])){
            return $this->response->errorInternalError($this->validator->errors()->all());
        }

        $user = UsersModel::where('email', $request->email)
            ->where('password', \PluginCommonSurvey\Helper\Hashed\hash_password($request->password))
            ->get();

        if(empty($user) || count($user) === 0){
            return $this->response->errorNotFound(trans('Please check your username or password'));
        }

        return $this->response->setStatusCode(200)->withArray([
            'status' => 'success',
            'message' => trans('login success')
        ]);
    }
}
