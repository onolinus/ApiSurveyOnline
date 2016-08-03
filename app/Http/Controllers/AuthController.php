<?php

namespace App\Http\Controllers;

use app\Libraries\Structure\SessionToken;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\AuthToken;
use EllipseSynergie\ApiResponse\Contracts\Response;
use Illuminate\Support\Facades\Validator;
use App\Transformer\TokenTransformer;
use PluginCommonSurvey\Libraries\ApiClient;
use PluginCommonSurvey\Libraries\Codes;
use App\Users as UsersModel;

class AuthController extends Controller
{
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

    private function checkApiClientAndSecretCode(Request $request){
        return $request->client_id != ApiClient::CLIENT_ID || $request->secret_code != ApiClient::SECRET_CODE ? false : true;
    }

    private function getInvalidApiClientAndSecretCodeResponce(){
        return $this->response->errorWrongArgs(trans('invalid api client or secret code value'));
    }

    public function store(Request $request){
        if(!$this->runValidation($request, [
            'user_id' => 'required|integer|exists:users,id',
            'client_id' => 'required',
            'secret_code' => 'required',
        ])){
            return $this->response->errorWrongArgs($this->validator->errors()->all());
        }

        if(!$this->checkApiClientAndSecretCode($request)){
            return $this->getInvalidApiClientAndSecretCodeResponce();
        }

        try {
            /** @var SessionToken $sessionToken */
            $sessionToken = AuthToken::getFreshInstance($request->user_id)->getSessionToken();
        }catch(\Exception $e){
            return $this->response->errorInternalError($e->getMessage());
        }

        return $this->response->setStatusCode(201)->withArray([
            'access_token' => $sessionToken->getAttribute('access_token'),
            'refresh_token' => $sessionToken->getAttribute('refresh_token'),
            'user_type' => $sessionToken->getAttribute('user_type'),
            'token_type' => $sessionToken->getAttribute('token_type'),
            'expires_in' => $sessionToken->getAttribute('expires_in'),
        ]);

    }

    public function update($refresh_token){
        try{
            /** @var SessionToken $sessionToken */
            $sessionToken = AuthToken::getInstanceFromRefreshToken($refresh_token)->getSessionToken();
        }catch(\Exception $e){
            return $this->response->errorInternalError($e->getMessage());
        }

        if(!$sessionToken){
            return $this->response->errorInternalError(trans('refresh token is invalid'));
        }

        return $this->response->setStatusCode(201)->withArray([
            'access_token' => $sessionToken->getAttribute('access_token'),
            'refresh_token' => $sessionToken->getAttribute('refresh_token'),
            'user_type' => $sessionToken->getAttribute('user_type'),
            'token_type' => $sessionToken->getAttribute('token_type'),
            'expires_in' => $sessionToken->getAttribute('expires_in'),
        ]);

    }

    public function grantpassword(Request $request){
        if(!$this->runValidation($request, [
            'email' => 'required|max:50|email|exists:users,email',
            'password' => 'required|min:5',
            'client_id' => 'required',
            'secret_code' => 'required'
        ])){
            return $this->response->errorInternalError($this->validator->errors()->all());
        }

        if(!$this->checkApiClientAndSecretCode($request)){
            return $this->getInvalidApiClientAndSecretCodeResponce();
        }

        $user = UsersModel::where('email', $request->email)
            ->where('password', \PluginCommonSurvey\Helper\Hashed\hash_password($request->password))
            ->first();

        if(empty($user) || count($user) === 0){
            return $this->response->errorNotFound(trans('Please check your username or password'));
        }

        try {
            /** @var SessionToken $sessionToken */
            $sessionToken = AuthToken::getFreshInstance($user->id)->getSessionToken();
        }catch(\Exception $e){
            return $this->response->errorInternalError($e->getMessage());
        }

        return $this->response->setStatusCode(200)->withArray([
            'status' => 'success',
            'access_token' => $sessionToken->getAttribute('access_token'),
            'refresh_token' => $sessionToken->getAttribute('refresh_token'),
            'user_type' => $sessionToken->getAttribute('user_type'),
            'token_type' => $sessionToken->getAttribute('token_type'),
            'expires_in' => $sessionToken->getAttribute('expires_in'),
        ]);
    }
}
