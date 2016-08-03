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

    public function store(Request $request){
        if(!$this->runValidation($request, [
            'user_id' => 'required|integer|exists:users,id',
            'client_id' => 'required',
            'secret_code' => 'required',
        ])){
            return $this->response->errorWrongArgs($this->validator->errors()->all());
        }

        if($request->client_id != ApiClient::CLIENT_ID || $request->secret_code != ApiClient::SECRET_CODE){
            return $this->response->errorWrongArgs([
                'status' => 'error',
                'message' => trans('invalid api client or secret code value'),
                'code' => Codes::INVALID_PARAMETER,
                'code_msg' => Codes::getInstance()->getCode(Codes::INVALID_PARAMETER)
            ]);
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
}
