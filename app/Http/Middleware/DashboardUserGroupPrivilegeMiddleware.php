<?php

namespace App\Http\Middleware;

use App\TraitPrivilegeMiddleware;

class DashboardUserGroupPrivilegeMiddleware
{

    use TraitPrivilegeMiddleware;

    private $user_type_allowed = ['admin', 'validator', 'guest', 'correspondent'];

    private function checkAccessByUserType(){
        return in_array($this->sessionToken->getAttribute('user_type'), $this->user_type_allowed);
    }
}
