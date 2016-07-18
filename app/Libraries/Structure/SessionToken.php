<?php
namespace app\Libraries\Structure;

use App\AuthToken;

class SessionToken extends StructureAbstract
{
    protected $attributes = ['user_id', 'user_type', 'token_type', 'expires_in'];

    /**
     * @var RedisToken
     */
    private $redisToken;

    private $redisData;

    public function __construct(RedisToken $redisToken)
    {
        $this->redisToken = $redisToken;
        $this->redisData = $this->redisToken->getAttribute();

        $this->generateSessionToken();
    }

    private function getExpiresIn(){
        $expiredin = strtotime($this->redisData['created_at']) - $this->redisToken->getCurrentTimeStamp() + (AuthToken::CACHE_TIME * 60);
        return $expiredin > 0 ? $expiredin : 0;
    }

    public function generateSessionToken(){
        $this->setAttribute('user_id', $this->redisData['user_id']);
        $this->setAttribute('user_type', $this->redisData['user_type']);
        $this->setAttribute('token_type', $this->redisData['token_type']);
        $this->setAttribute('expires_in', $this->getExpiresIn());
    }

    public function getAttribute($attribute_name = null){
        if(is_null($attribute_name)){
            $this->setAttribute('expires_in', $this->getExpiresIn());
            return $this->data;
        }

        return !in_array($attribute_name, $this->attributes) ? null : ($attribute_name === 'expires_in' ? $this->getExpiresIn() : $this->data[$attribute_name]);
    }
}