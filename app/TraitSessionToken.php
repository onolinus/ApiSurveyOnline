<?php

namespace App;

use app\Libraries\SessionTokenAccessor;

trait TraitSessionToken
{
    /**
     * @var AuthToken
     */
    private $authToken;

    private $redisData;

    /**
     * @var SessionTokenAccessor $sessionTokenAccessor
     */
    private $sessionTokenAccessor;

    /**
     * This must be protected cause called from parent override TraitFractalResponse `initialize`
     */
    protected function initialize()
    {
        if(!\App::runningInConsole()) {
            $this->sessionTokenAccessor = SessionTokenAccessor::getInstance();
        }
    }

    public function getRedisData(){
        return $this->sessionTokenAccessor->getRedisData();
    }

    public function getSessionUserID(){
        return $this->sessionTokenAccessor->getSessionUserID();
    }

    public function getSessionUserType(){
        return $this->sessionTokenAccessor->getSessionUserType();
    }
}
