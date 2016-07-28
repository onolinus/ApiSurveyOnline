<?php

namespace App;

use app\Libraries\Structure\RedisToken;
use app\Libraries\Structure\SessionToken;
use Illuminate\Support\Facades\Cache;
use App\Users;

class AuthToken
{
    CONST TOKEN_PREFIX = 'token';

    CONST CACHE_TIME = 60; // in minutes

    private $access_token;

    /**
     * @var RedisToken
     */
    private $redisToken;

    /**
     * @var SessionToken
     */
    private $sessionToken;

    /**
     * @var self
     */
    private static $instance;

    public static function getFreshInstance($user_id){
        if(is_null(self::$instance)){
            self::$instance = new self;
            self::$instance->generateNewSessionToken($user_id);
        }

        return self::$instance;
    }

    public static function getInstanceFromRedisToken(RedisToken $redisToken){
        if(is_null(self::$instance)){
            self::$instance = new self;
            self::$instance->setSessionTokenByRedisToken($redisToken);
        }

        return self::$instance;
    }

    public static function getInstanceFromAccessToken($access_token){
        if(is_null(self::$instance)){
            self::$instance = new self;
            self::$instance->setSessionTokenByAccessToken($access_token);
        }

        return self::$instance;
    }

    public function getSessionToken(){
        return $this->sessionToken;
    }

    protected function setSessionToken(SessionToken $sessionToken){
        $this->sessionToken = $sessionToken;
        return $this;
    }

    public function getRedisToken(){
        return $this->redisToken;
    }

    protected function setRedisToken(RedisToken $redisToken){
        $this->redisToken = $redisToken;
        return $this;
    }

    public function getAccessToken(){
        return $this->access_token;
    }

    protected function setAccessToken($access_token){
        $this->access_token = $access_token;
        return $this;
    }

    protected function setNewAccessToken($uniqId = null){
        $uniqId = is_null($uniqId) ? $this->generateUniqId() : $uniqId;
        $this->access_token = sprintf('%s%s', md5(sprintf('%s:%s', self::TOKEN_PREFIX, $uniqId)), $uniqId);
        return $this;
    }


    protected function isFoundInCache($access_token){
        return Cache::get($access_token);
    }

    protected function setSessionTokenByAccessToken($access_token){
        if($data = $this->isFoundInCache($access_token)){
            $data['access_token'] = $access_token;
            $this->setRedisToken(new RedisToken($data))->setAccessToken($this->redisToken->getAccessToken())->setSessionToken(new SessionToken($this->redisToken));
            return $this->sessionToken;
        }

        return null;
    }

    protected function setSessionTokenByRedisToken(RedisToken $redisToken){
        $this->setRedisToken($redisToken)->setAccessToken($this->setAccessToken($this->redisToken->getAccessToken()))->setSessionToken(new SessionToken($this->redisToken));
        return $this->sessionToken;
    }

    protected function generateUniqId(){
        return microtime(true) * 10000;
    }

    protected function getCurrentDate(){
        return date('Y-m-d H:i:s');
    }

    protected function isExistUser($user_id){
        $user = Users::find($user_id);
        if(!$user){
            throw new \Exception(sprintf("User Id %d is not exist in database", $user_id));
        }

        return $user;
    }

    protected function generateNewSessionToken($user_id){
        $user = $this->isExistUser($user_id);

        $this->setNewAccessToken()->setRedisToken(new RedisToken([
            'access_token' => $this->getAccessToken(),
            'user_id' => $user_id,
            'user_type' => $user->type,
            'token_type' => RedisToken::TOKEN_TYPE,
            'created_at' => $this->getCurrentDate()
        ]))->setSessionToken(new SessionToken($this->redisToken));

        Cache::put($this->getAccessToken(), $this->redisToken->getAttribute(), self::CACHE_TIME);

        return $this->sessionToken;
    }
}
