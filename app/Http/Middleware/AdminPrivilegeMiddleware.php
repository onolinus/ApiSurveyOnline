<?php

namespace App\Http\Middleware;

use App\AuthToken;
use app\Libraries\Structure\SessionToken;
use Closure;

class AdminPrivilegeMiddleware extends PrivilegeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$this->checkIsInvalidToken($request, $next)){
            return $this->responseInvalidToken();
        }

        if($this->sessionToken->getAttribute('user_type') !== 'admin'){
            return $this->responseUnathorizedAccess();
        }

        return $next($request);
    }
}
