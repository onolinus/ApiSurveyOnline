<?php

namespace App\Http\Middleware;

use App\TraitPrivilegeMiddleware;

class CorrespondentPrivilegeMiddleware
{

    use TraitPrivilegeMiddleware;

    CONST USER_TYPE_ALLOWED = 'correspondent';

    private function checkAccessByUserType(){
        return $this->sessionToken->getAttribute('user_type') === self::USER_TYPE_ALLOWED;
    }
}
