<?php

namespace App\Http\Middleware;

use Closure;

class CorrespondentPrivilegeMiddleware extends PrivilegeMiddleware
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

        if($this->sessionToken->getAttribute('user_type') !== 'correspondent'){
            return $this->responseUnathorizedAccess();
        }

        return $next($request);
    }
}
