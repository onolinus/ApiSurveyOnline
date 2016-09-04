<?php

namespace App\Http\Middleware;

use App\TraitPrivilegeMiddleware;
use Illuminate\Http\Request;

class AnswersPrivilegeMiddleware
{

    use TraitPrivilegeMiddleware;

    private $USER_TYPE_ALLOWED = ['admin', 'validator'];

    private function checkAccessByUserType(){
        return in_array($this->sessionToken->getAttribute('user_type'), $this->USER_TYPE_ALLOWED);
    }
}
