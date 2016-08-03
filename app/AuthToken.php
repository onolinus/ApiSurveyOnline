<?php

namespace App;

use app\Libraries\Structure\RedisAccessToken;
use app\Libraries\Structure\RedisRefreshToken;
use app\Libraries\Structure\RedisUserToken;
use app\Libraries\Structure\SessionToken;
use Illuminate\Support\Facades\Cache;
use App\Users;

class AuthToken
{
    CONST TOKEN_PREFIX = 'token';

    CONST ACCESS_TOKEN_CACHE_TIME = 60; // in minutes

    CONST REFRESH_TOKEN_CACHE_TIME = 300; // in minutes

    CONST USER_TOKEN_CACHE_TIME = 60; // in minutes

    private $access_token, $refresh_token, $user_token;

    /**
     * @var SessionToken
     */
    private $sessionToken;

    /**
     * @var RedisAccessToken
     */
    private $redisAccessToken;

    /**
     * @var RedisUserToken
     */
    private $redisUserToken;

    /**
     * @var RedisRefreshToken
     */
    private $redisRefreshToken;


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

    public static function getInstanceFromAccessToken($access_token){
        if(is_null(self::$instance)){
            self::$instance = new self;
            self::$instance->setSessionTokenByAccessToken($access_token);
        }

        return self::$instance;
    }


    /**
     * @param SessionToken $sessionToken
     * @return $this
     */
    protected function setSessionToken(SessionToken $sessionToken){
        $this->sessionToken = $sessionToken;
        return $this;
    }

    /**
     * @return SessionToken
     */
    public function getSessionToken(){
        return $this->sessionToken;
    }

    /**
     * @param RedisAccessToken $redisAccessToken
     * @return $this
     */
    protected function setRedisAccessToken(RedisAccessToken $redisAccessToken){
        $this->redisAccessToken = $redisAccessToken;
        return $this;
    }

    /**
     * @return RedisAccessToken
     */
    public function getRedisAccessToken(){
        return $this->redisAccessToken;
    }

    /**
     * @param RedisUserToken $userToken
     * @return $this
     */
    protected function setRedisUserToken(RedisUserToken $userToken){
        $this->redisUserToken = $userToken;
        return $this;
    }

    /**
     * @return RedisUserToken
     */
    public function getRedisUserToken(){
        return $this->redisUserToken;
    }

    /**
     * @param RedisRefreshToken $userToken
     * @return $this
     */
    protected function setRedisRefreshToken(RedisRefreshToken $userToken){
        $this->redisRefreshToken = $userToken;
        return $this;
    }

    /**
     * @return RedisRefreshToken
     */
    public function getRedisRefreshToken(){
        return $this->redisRefreshToken;
    }

    /**
     * ACCESS TOKEN
     * @param $access_token
     * @return $this
     */
    protected function setAccessToken($access_token){
        $this->access_token = $access_token;
        return $this;
    }

    protected function setNewAccessToken(){
        $uniqId = $this->generateUniqId();
        $this->access_token = sprintf('%s%s', md5(sprintf('accesstoken:%s:%s', self::TOKEN_PREFIX, $uniqId)), $uniqId);
        return $this;
    }

    public function getAccessToken(){
        return $this->access_token;
    }

    /**
     * USER TOKEN
     * @param $user_id
     * @return $this
     */
    protected function setUserToken($user_id){
        $this->user_token = sprintf('user:accesstoken:reference:%d', $user_id);
        return $this;
    }

    public function getUserToken(){
        return $this->user_token;
    }

    /**
     * REFRESH TOKEN
     * @param $refresh_token
     * @return $this
     */
    protected function setRefreshToken($refresh_token){
        $this->refresh_token = $refresh_token;
        return $this;
    }

    protected function setNewRefreshToken(){
        $uniqId = $this->generateUniqId();
        $this->refresh_token = sprintf('%s%s', md5(sprintf('refreshtoken:%s:%s', self::TOKEN_PREFIX, $uniqId)), $uniqId);
        return $this;
    }

    public function getRefreshToken(){
        return $this->refresh_token;
    }

    protected function isAccessTokenFoundInCache($access_token){
        return Cache::get($access_token);
    }

    protected function generateUniqId(){
        return microtime(true) * 10000;
    }

    protected function getCurrentDate(){
        return date('Y-m-d H:i:s');
    }

    protected function isExistUserInDB($user_id){
        $user = Users::find($user_id);
        if(!$user){
            throw new \Exception(sprintf("User Id %d is not exist in database", $user_id));
        }

        return $user;
    }

    protected function isExistUserInRedisUserToken($user_id){
        $this->setUserToken($user_id);
        if($data = Cache::get($this->getUserToken())){
            return $sessionToken = $this->setSessionTokenByAccessToken($data['access_token']);
        }

        return null;
    }

    protected function setSessionTokenByAccessToken($access_token){
        if($data = $this->isAccessTokenFoundInCache($access_token)){
            $data['access_token'] = $access_token;
            $this->setAccessToken($access_token)
                ->setRedisAccessToken(new RedisAccessToken($data))
                ->setSessionToken(new SessionToken($this->redisAccessToken));
            return $this->sessionToken;
        }

        return null;
    }

    protected function generateNewSessionToken($user_id){
        // 1. check in cache by user_id
        if($sessionToken = $this->isExistUserInRedisUserToken($user_id)){
            return $sessionToken;
        }

        // 2. check in database
        $user = $this->isExistUserInDB($user_id);

        // 3. generate new token
        $this->setNewAccessToken()
            ->setUserToken($user_id)
            ->setNewRefreshToken()
            ->setRedisAccessToken(new RedisAccessToken([
                'access_token' => $this->getAccessToken(),
                'refresh_token' => $this->getRefreshToken(),
                'user_id' => $user_id,
                'user_type' => $user->type,
                'token_type' => RedisAccessToken::TOKEN_TYPE,
                'created_at' => $this->getCurrentDate(),
            ]))
            ->setRedisUserToken(new RedisUserToken($this->getRedisAccessToken()))
            ->setRedisRefreshToken(new RedisRefreshToken($this->getRedisAccessToken()))
            ->setSessionToken(new SessionToken($this->getRedisAccessToken()));

        Cache::put($this->getUserToken(), $this->redisUserToken->getAttribute(), self::USER_TOKEN_CACHE_TIME);
        Cache::put($this->getAccessToken(), $this->redisAccessToken->getAttribute(), self::ACCESS_TOKEN_CACHE_TIME);
        Cache::put($this->getRefreshToken(), $this->redisRefreshToken->getAttribute(), self::REFRESH_TOKEN_CACHE_TIME);

        return $this->sessionToken;
    }
}
