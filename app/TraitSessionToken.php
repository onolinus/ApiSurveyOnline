<?php

namespace App;

trait TraitSessionToken
{
    /**
     * @var AuthToken
     */
    private $authToken;

    private $redisData;

    /**
     * This must be protected cause called from parent override TraitFractalResponse `initialize`
     */
    protected function initialize()
    {
        $this->setAuthTokenInstance();
        $this->setRedisData();
    }

    private function setAuthTokenInstance(){
        $this->authToken = AuthToken::getInstance();
    }

    public function setRedisData(){
        $redisAccessToken =  $this->authToken->getRedisAccessToken();
        $this->redisData = $redisAccessToken->getAttribute();
    }

    public function getRedisData(){
        return $this->redisData;
    }

    public function getSessionUserID(){
        return $this->redisData['user_id'];
    }

    public function getSessionUserType(){
        return $this->redisData['user_type'];
    }
}
