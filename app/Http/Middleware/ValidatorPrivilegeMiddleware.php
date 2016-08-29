<?php

namespace App\Http\Middleware;

use App\TraitPrivilegeMiddleware;

class ValidatorPrivilegeMiddleware
{

    use TraitPrivilegeMiddleware;

    CONST USER_TYPE_ALLOWED = 'validator';

    private function checkAccessByUserType(){
        return $this->sessionToken->getAttribute('user_type') === self::USER_TYPE_ALLOWED;
    }
}
