<?php

namespace App\Http\Controllers;

use app\Libraries\Structure\SessionToken;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\AuthToken;
use EllipseSynergie\ApiResponse\Contracts\Response;
use Illuminate\Support\Facades\Validator;
use App\Transformer\TokenTransformer;

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
            'user_id' => 'required|integer|exists:users,id'
        ])){
            return $this->response->errorInternalError($this->validator->errors()->all());
        }

        $sessionToken = AuthToken::getFreshInstance($request->user_id)->getSessionToken();

        return $this->response->setStatusCode(200)->withArray([
            'access_token' => $sessionToken->getAttribute('access_token'),
            'user_type' => $sessionToken->getAttribute('user_type'),
            'token_type' => $sessionToken->getAttribute('token_type'),
            'expires_in' => $sessionToken->getAttribute('expires_in'),
        ]);

    }
}
