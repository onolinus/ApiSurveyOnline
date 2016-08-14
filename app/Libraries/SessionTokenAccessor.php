<?php

namespace app\Libraries;


use App\AuthToken;

class SessionTokenAccessor{

    private static $instance;

    /**
     * @var AuthToken
     */
    private $authToken;

    private $redisData;

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function __construct(AuthToken $authToken = null)
    {
        $this->authToken = is_null($authToken) ? AuthToken::getInstance() : $authToken;
        $redisAccessToken =  $this->authToken->getRedisAccessToken();
        $this->redisData = $redisAccessToken->getAttribute();
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