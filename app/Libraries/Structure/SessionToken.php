<?php
namespace app\Libraries\Structure;

use App\AuthToken;

class SessionToken extends StructureAbstract
{
    protected $attributes = ['access_token', 'user_type', 'token_type', 'expires_in'];

    /**
     * @var RedisToken
     */
    private $redisToken;

    public function __construct(RedisToken $redisToken)
    {
        $this->redisToken = $redisToken;
        $data = $this->redisToken->getAttribute();

        $this->generateSessionToken($data);
    }

    private function getExpiresIn(){
        $expiredin = strtotime($this->redisToken->getAttribute('created_at')) - $this->redisToken->getCurrentTimeStamp() + (AuthToken::CACHE_TIME * 60);
        return $expiredin > 0 ? $expiredin : 0;
    }

    public function set_expires_in(){
        $this->data['expires_in'] = $this->getExpiresIn();
    }

    public function generateSessionToken($data){
        $this->setAttribute('access_token', $this->redisToken->getAccessToken());
        $this->setAttribute('user_type', $data['user_type']);
        $this->setAttribute('token_type', $data['token_type']);
        $this->set_expires_in();
    }


    public function getAttribute($attribute_name = null){
        if(is_null($attribute_name)){
            $this->setAttribute('expires_in', $this->getExpiresIn());
            return $this->data;
        }

        if($attribute_name === 'expires_in'){
            return $this->getExpiresIn();
        }

        return !in_array($attribute_name, $this->attributes) ? null : $this->data[$attribute_name];
    }
}