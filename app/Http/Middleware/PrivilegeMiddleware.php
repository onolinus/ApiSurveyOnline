<?php

namespace App\Http\Middleware;

use App\AuthToken;
use app\Libraries\Structure\SessionToken;
use Closure;
use PluginCommonSurvey\Libraries\Codes;

class PrivilegeMiddleware
{
    /**
     * @var SessionToken
     */
    protected $sessionToken;

    protected function checkIsInvalidToken(\Illuminate\Http\Request $request, Closure $next){
        /** @var SessionToken $sessionToken */
        $this->sessionToken = AuthToken::getInstanceFromAccessToken($request->bearerToken())->getSessionToken();
        return $this->sessionToken ? true : false;
    }

    protected function responseInvalidToken(){
        return response()->json([
            'status' => 'error',
            'message' => trans('your token is invalid or has been expired'),
            'code' => Codes::INVALID_TOKEN,
            'code_message' => Codes::getInstance()->getCode(Codes::INVALID_TOKEN)
        ])->setStatusCode(401);
    }

    protected function responseUnathorizedAccess(){
        return response()->json([
            'status' => 'error',
            'code' => Codes::UNAUTHORIZED_ACCESS,
            'code_message' => Codes::getInstance()->getCode(Codes::UNAUTHORIZED_ACCESS),
            'message' => trans('Unathorized access for this endpoint')
        ])->setStatusCode(401);
    }
}
