<?php
namespace app\Libraries\Structure;

class RedisToken extends StructureAbstract
{
    protected $attributes = ['user_id', 'user_type', 'token_type', 'created_at'];

    private $access_token;

    protected function initialize($data)
    {
        if(!is_array($data) || empty($data)){
            throw new \Exception(sprintf('Parameter data must be an array and cannot be empty : %s', var_export($data, true)));
        }

        if(!isset($data['access_token'])){
            throw new \Exception('Access token parameter required');
        }

        $this->access_token = $data['access_token'];

        foreach($this->attributes as $attribute_name){
            if(!array_key_exists($attribute_name, $data)){
                throw new \Exception(sprintf('Parameter data must be contain index : "%s"', $attribute_name));
            }

            $this->setAttribute($attribute_name, $data[$attribute_name]);
        }

        return true;
    }

    public function getCurrentTimeStamp(){
        return strtotime(date('Y-m-d H:i:s'));
    }

    public function getAccessToken(){
        return $this->access_token;
    }
}